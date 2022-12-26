<?php
require_once './Models/Reservation.php';

class ReservationController
{
    public function __construct()
    {
        $this->Reservation = new Reservation();
        $this->Display = new Display();
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
                case 'handleReservation':
                    $this->handleReservation();
                    break;
                case 'reservDetails':
                    $this->reservDetails($id);
                default:
                    http_response_code(404);
                    break;
            }
        } catch (Exception $e) {
            throw $e;
        }
    }

    public function reservDetails($id)
    {
        $user_id = isset($_SESSION['user']->id) ? $_SESSION['user']->id : 'NULL';
        $result = $this->Reservation->hasReservation($user_id);

        $array = $result->fetchall(PDO::FETCH_ASSOC);
        foreach ($array as $value) {
            if ($user_id != $value['user_id']) {
                Functions::toast('Dit mag niet!', 'error', 'toast-top-right');
                header('Location: index.php');
                exit();
            } else {
                $formInputs = $this->Display->reservDetailsForm($this->Reservation->hasReservation($user_id));
                include 'Views/Pages/reservDetails.php';
            }
        }
    }

    public function handleReservation()
    {
        if (isset($_POST['submit'])) {
            if (!isset($_SESSION['user']->id)) {
                Functions::toast('Meld je eerst aan!', 'error', 'toast-top-right');
                header('Location: index.php?con=home&op=login');
                exit();
            }
            $user_id = isset($_SESSION['user']->id) ? $_SESSION['user']->id : 'NULL';
            $hasReservation = $this->Reservation->hasReservation($user_id);
            $res = $hasReservation->fetchall(PDO::FETCH_ASSOC);
            if (count($res) <= 1) {
                foreach ($res as $value) {
                    $reservation_id = $value['reservation_id'];
                }
                Functions::toast('Deze factuur staat nog open!', 'info', 'toast-top-right');
                header("Location: index.php?con=reserv&op=reservDetails&id={$reservation_id}");
                exit();
            } else {
                // go to list of view with more reservations of that person 
                Functions::toast('Je hebt nog betalingen open staan!', 'info', 'toast-top-right');
                header('Location: index.php');
                exit();
            }

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
        }
    }
}
