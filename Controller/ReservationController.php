<?php
require_once './Models/Reservation.php';

class ReservationController
{
    public function __construct()
    {
        $this->Reservation = new Reservation();
    }

    public function __destruct()
    {
    }

    public function handleRequest()
    {
        try {

            $action = isset($_GET['op']) ? $_GET['op'] : 'index';
            switch ($action) {
                case 'handleReservation':
                    $this->handleReservation();
                    break;
                default:
                    http_response_code(404);
                    break;
            }
        } catch (Exception $e) {
            throw $e;
        }
    }

    public function handleReservation()
    {
        if (isset($_POST['submit'])) {
            if (!isset($_SESSION['user']->id)) {
                Functions::toast('Meld je eerst aan!', 'error', 'toast-top-right');
                header('Location: index.php?con=home&op=login');
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
