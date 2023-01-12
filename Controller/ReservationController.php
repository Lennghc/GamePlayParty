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
                case 'create':
                    $this->create();
                    break;
                case 'invoice':
                    $this->invoice($id);
                    break;
                default:
                    http_response_code(404);
                    break;
            }
        } catch (Exception $e) {
            throw $e;
        }
    }

    public function invoice($id)
    {

        $result = $this->Reservation->getDataforPDF($id);

        if (!isset($result->errors)) {
            var_dump($result->fetchall(PDO::FETCH_ASSOC));
        }
    }

    public function create()
    {
        $userData = isset($_POST['userData']) ? $_POST['userData'] : null;
        $inputFields = isset($_POST['inputFields']) ? $_POST['inputFields'] : null;
        $timeslotData = isset($_POST['timeslotData']) ? $_POST['timeslotData'] : null;
        $array = [];

        for ($i = 0; $i < count($inputFields); $i++) {
            foreach ($inputFields[$i] as $key => $value) {
                $array[$i]['rates_id'] = $value['rates_id'];
                $array[$i]['people'] = $value['people'];
            }
        }



        // timeslot setting to active
        $timeslotArray = explode('-', $timeslotData['timeslot']);

        $start_time = $timeslotArray[0];
        $end_time = $timeslotArray[1];

        $time[$timeslotData['key']]['slot_start_time'] = $start_time;
        $time[$timeslotData['key']]['slot_end_time'] = $end_time;
        $time[$timeslotData['key']]['active'] = 1;

        $encodeTimeslot = json_encode($time);

        // echo '<pre>';
        // print_r($encodeTimeslot);
        // echo '</pre>';
        // ending timeslot setting to active

        $encodeUserData = json_encode($userData);

        $encodeField = json_encode($array);

        $result = $this->Reservation->setReservation($encodeField, $encodeUserData, $encodeTimeslot, $timeslotData['lounge_id'], $timeslotData['lounge_open_date']);

        if (!isset($result->errors)) {
            echo Functions::toJSON(array(
                'url' => 'index.php?con=reserv&op=invoice&id=' . $result,
            ));

            $this->Reservation->setTimeSlotInactive($timeslotData['lounge_id'], $encodeTimeslot, $timeslotData['key']);
            exit;
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

    public function handleReservation()
    {
        if (isset($_POST['submit'])) {
            $place = isset($_POST['key']) ? $_POST['key'] : null;


            $timeslot = isset($_POST['timeslot']) ? $_POST['timeslot'] : NULL;
            $date = isset($_POST['date']) ? $_POST['date'] : NULL;
            $lounge_id = isset($_POST['lounge_id']) ? $_POST['lounge_id'] : NULL;


            $formInputs = $this->Display->createUserForm($timeslot, $date, $place, $lounge_id);
            $rates = $this->Display->createRatesForm($this->Rates->getCinemaRates($lounge_id));

            include 'Views/Pages/reservDetails.php';

            // $result = $this->Reservation->setTimeSlot($arra, $date, $lounge_id, $user_id);

            exit();
        } else {
            http_response_code(404);
        }
    }
}
