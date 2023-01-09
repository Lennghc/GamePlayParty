<?php
require_once './Models/Lounge.php';

class LoungeController
{
    public function __construct()
    {
        $this->Lounge = new Lounge();
        $this->Display = new Display();
        $this->Cinema = new Cinema();
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
        $role = isset($_SESSION['user']->role_id) ? $_SESSION['user']->role_id : null;
        $user_id = isset($_SESSION['user']->id) ? $_SESSION['user']->id : null;

        if ($role == 3) {
            $result = $this->Lounge->ownLounges($user_id);
            $table = $this->Display->createTable($result, false, false, false, true);
        }

        include './Views/Pages/Admin/Lounge/index.php';
    }

    public function create()
    {
        $user_id = isset($_SESSION['user']->id) ? $_SESSION['user']->id : null;

        $result = $this->Cinema->hasCinema($user_id)->fetchall(PDO::FETCH_ASSOC);

        if (isset($_POST['submit'])) {
            $lounge_nmr = isset($_POST['lounge_nmr']) ? $_POST['lounge_nmr'] : null;
            $lounge_chair_places = isset($_POST['lounge_chair_places']) ? $_POST['lounge_chair_places'] : null;
            $lounge_wheelchair_places = isset($_POST['lounge_wheelchair_places']) ? $_POST['lounge_wheelchair_places'] : null;
            $lounge_start_time = isset($_POST['slot_start_time']) ? $_POST['slot_start_time'] : null;
            $lounge_end_time = isset($_POST['slot_end_time']) ? $_POST['slot_end_time'] : null;
            $lounge_open_date = isset($_POST['reservated_date']) ? $_POST['reservated_date'] : null;
            $lounge_screensize = isset($_POST['lounge_screensize']) ? $_POST['lounge_screensize'] : null;


            $time = Functions::getTimeSlot(90, $lounge_start_time, $lounge_end_time);
            $lounge_timeslots = json_encode($time);
            $cinema_id = $result[0]['cinema_id'];

            $res = $this->Lounge->create($lounge_nmr, $lounge_chair_places, $lounge_wheelchair_places, $lounge_screensize, $lounge_open_date, $lounge_timeslots, $cinema_id);
            $dump = var_dump($res);
        }
        include 'Views/Pages/Admin/Lounge/create.php';
    }

}
