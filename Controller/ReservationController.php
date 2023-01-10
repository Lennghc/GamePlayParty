<?php
require_once './Models/Reservation.php';
require_once './Models/Cinema.php';
require_once './Models/Auth.php';

class ReservationController
{
    public function __construct()
    {
        $this->Reservation = new Reservation();
        $this->Display = new Display();
        $this->Cinema = new Cinema();
        $this->Auth = new Auth();
        $this->Lounge = new Lounge();
        $this->Rates = new Rates();
    }

    public function __destruct()
    {
    }

    public function handleRequest()
    {
        try {

            $action = isset($_GET['op']) ? $_GET['op'] : 'index';
            $id = isset($_GET['id']) ? $_GET['id'] : NULL;
            switch ($action) {
                case 'index':
                    $this->index();
                    break;
                case 'handleReservation':
                    $this->handleReservation();
                    break;
                case 'reservDetails':
                    $this->reservDetails($id);
                    break;
                default:
                    http_response_code(404);
                    break;
            }
        } catch (Exception $e) {
            throw $e;
        }
    }

    public function index()
    {
        $role = isset($_SESSION['user']->role_id) ? $_SESSION['user']->role_id : null;
        $user_id = isset($_SESSION['user']->id) ? $_SESSION['user']->id : null;

        if ($role == 3) {
            // Bioscoop eigenaar
            // Bekijk als Bioscoop eigenaar al een bioscoop op zijn naam heeft
            $result = $this->Cinema->hasCinema($user_id);
            if ($result->rowCount() == 0) {
                // Bioscoop create aanroepen
                header('Location: index.php?con=cinema&op=create');
                exit();
            } else {
                $result = $this->Reservation->ownCinemasReservations($user_id);
                $table = $this->Display->createTable($result, false, false, true, false);
            }
        } elseif ($role == 4) {
            // Jack jones eigenaar
            $result = $this->Reservation->allReservationCinemas();
            $table = $this->Display->createTable($result);
        } else {
            Functions::toast('Onbevoegd hiervoor', 'error', 'toast-top-right');
            header('Location: index.php');
            exit();
        }

        include 'Views/Pages/Admin/Reservation/index.php';
    }


    public function reservDetails($id)
    {
        $user_id = isset($_SESSION['user']->id) ? $_SESSION['user']->id : 'NULL';
        $result = $this->Reservation->hasReservation($user_id);

        $array = $result->fetchall(PDO::FETCH_ASSOC);
        foreach ($array as $value) {
            if ($user_id == $value['user_id'] and $id == $value['reservation_id']) {
                $formInputs = $this->Display->createUserForm($this->Auth->collectUserData($user_id), false, "index.php?con=reserv&op=reservDetails&id={$id}");
                $cinemaID = $this->Lounge->getCinemaIDByLoungeID($value['lounge_id']);
                $cinema_id = $cinemaID->fetchall(PDO::FETCH_ASSOC);
                $rates = $this->Display->createRatesForm($this->Rates->getCinemaRates($cinema_id[0]['cinema_id']));
                include 'Views/Pages/reservDetails.php';


                if (isset($_POST['submit'])) {
                    $fName = isset($_POST['fName']) ? $_POST['fName'] : null;
                    $mName = isset($_POST['mName']) ? $_POST['mName'] : null;
                    $lName = isset($_POST['lName']) ? $_POST['lName'] : null;
                    $street = isset($_POST['street']) ? $_POST['street'] : null;
                    $house_nmr = isset($_POST['houseNumber']) ? $_POST['houseNumber'] : null;
                    $zipcode = isset($_POST['zipcode']) ? $_POST['zipcode'] : null;
                    $city = isset($_POST['city']) ? $_POST['city'] : null;
                    $tel = isset($_POST['tel']) ? $_POST['tel'] : null;


                    $this->Reservation->updateUser($user_id, $fName, $mName, $lName, $street, $house_nmr, $zipcode, $city, $tel);
                    Functions::toast("{$_SESSION['user']->username} met success bijgewerkt!", 'success', 'toast-top-right');
                    // header("Location: index.php?con=reserv&op=reservDetails&id={$id}");
                    exit();
                }
            } else {
                Functions::toast('Dit mag niet!', 'error', 'toast-top-right');
                header('Location: index.php');
                exit();
            }
        }
    }

    public function handleReservation()
    {
        if (isset($_POST['submit'])) {
            if (!isset($_SESSION['user']->id)) {
                Functions::toast('Meld je eerst aan!', 'error', 'toast-top-right');
                header('Location: index.php?con=auth&op=login');
                exit();
            }
            $user_id = isset($_SESSION['user']->id) ? $_SESSION['user']->id : 'NULL';
            $hasReservation = $this->Reservation->hasReservation($user_id);
            $res = $hasReservation->fetchall(PDO::FETCH_ASSOC);
            if ($hasReservation->rowCount() ==  0) {
                $timeslot = isset($_POST['timeslot']) ? $_POST['timeslot'] : NULL;
                $date = isset($_POST['date']) ? $_POST['date'] : NULL;
                $lounge_id = isset($_POST['lounge_id']) ? $_POST['lounge_id'] : NULL;
                $user_id = isset($_SESSION['user']->id) ? $_SESSION['user']->id : NULL;

                $timeslotArray = explode('-', $timeslot);

                $start_time = $timeslotArray[0];
                $end_time = $timeslotArray[1];

                $time[1]['slot_start_time'] = $start_time;
                $time[1]['slot_end_time'] = $end_time;

                $arra = json_encode($time);

                $result = $this->Reservation->setTimeSlot($arra, $date, $lounge_id, $user_id);

                header("Location: index.php?con=reserv&op=reservDetails&id={$result}");
                exit();
            } elseif ($hasReservation->rowCount() >= 1) {
                foreach ($res as $value) {
                    $reservation_id = $value['reservation_id'];
                }
                Functions::toast('Deze factuur staat nog open!', 'info', 'toast-top-right');
                header("Location: index.php?con=reserv&op=reservDetails&id={$reservation_id}");
                exit();
            }


            // else {
            //     // go to list of view with more reservations of that person
            //     Functions::toast('Je hebt nog betalingen open staan!', 'info', 'toast-top-right');
            //     header('Location: index.php');
            //     exit();
            // }
        }
    }
}
