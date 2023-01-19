<?php
require_once './Models/Availabilty.php';

class AvailabiltyController
{
    public function __construct()
    {
        $this->Availabilty = new Availabilty();
        $this->Display = new Display();
        $this->Lounge = new Lounge();
    }

    public function __destruct()
    {
    }

    public function handleRequest()
    {
        try {

            $action = isset($_GET['op']) ? $_GET['op'] : 'index';

            switch ($action) {
                case 'index':
                    $this->index();
                    break;
                case 'create':
                    $this->create();
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
        $user_id = isset($_SESSION['user']->id) ? $_SESSION['user']->id : null;


        $result = $this->Availabilty->collectallAvailabilty($user_id);
        $table = $this->Display->createTable($result, true, false, false, true);

        include 'Views/Pages/Admin/Availabilty/index.php';
    }

    public function create()
    {
        $user_id = isset($_SESSION['user']->id) ? $_SESSION['user']->id : null;


        $result = $this->Lounge->collectAllLounges($user_id);
        
        $selectLoungeOptions = $this->Display->selectLoungesOptions($result);


        if (isset($_POST['submit'])) {
            $lounge_id = isset($_POST['lounge']) ? $_POST['lounge'] : null;
            $availabilty_start_time = isset($_POST['slot_start_time']) ? $_POST['slot_start_time'] : null;
            $availabilty_end_time = isset($_POST['slot_end_time']) ? $_POST['slot_end_time'] : null;
            $availabilty_date = isset($_POST['reservated_date']) ? $_POST['reservated_date'] : null;

            $time = Functions::getTimeSlot(90, $availabilty_start_time, $availabilty_end_time);
            $availabilty_timeslots = json_encode($time);

            $this->Availabilty->insertAvailabilty($lounge_id,$availabilty_date,$availabilty_timeslots);

            
        }
        include 'Views/Pages/Admin/Availabilty/create.php';
    }
}
