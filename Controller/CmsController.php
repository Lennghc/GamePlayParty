<?php
require_once './Models/Cms.php';
require_once './Models/Reservation.php';
require_once './Models/Lounge.php';
require_once './Models/Cinema.php';
require_once './Models/Auth.php';
require_once './Classes/Functions.php';
require_once './Classes/Display.php';

class CmsController
{
    public function __construct()
    {
        $this->Cms = new Cms();
        $this->Reservation = new Reservation();
        $this->Display = new Display();
        $this->Lounge = new Lounge();
        $this->Cinema = new Cinema();
        $this->Auth = new Auth();
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
                case 'lounges':
                    $this->lounges();
                    break;
                case 'cinemas':
                    $this->cinemas();
                    break;
                case 'users':
                    $this->users();
                    break;
                default:
                    http_response_code(404);
                    break;
            }
        } catch (Exception $e) {
            throw $e;
        }
    }

    public function users()
    {
        $role = isset($_SESSION['user']->role_id) ? $_SESSION['user']->role_id : null;

        if ($role == 4) {
            $result = $this->Auth->all();
            $table = $this->Display->createTable($result, true);
        } else {
            Functions::toast('Onbevoegd hiervoor', 'error', 'toast-top-right');
            header('Location: index.php');
            exit();
        }

        include './Views/Pages/Admin/Users/index.php';
    }

    public function cinemas()
    {
        $role = isset($_SESSION['user']->role_id) ? $_SESSION['user']->role_id : null;

        if ($role == 4) {
            $result = $this->Cinema->all();
            $table = $this->Display->createTable($result);
        } else {
            Functions::toast('Onbevoegd hiervoor', 'error', 'toast-top-right');
            header('Location: index.php');
            exit();
        }

        include './Views/Pages/Admin/Cinema/index.php';
    }

    public function lounges()
    {
        $role = isset($_SESSION['user']->role_id) ? $_SESSION['user']->role_id : null;
        $user_id = isset($_SESSION['user']->id) ? $_SESSION['user']->id : null;

        if ($role == 3) {
            $result = $this->Lounge->ownLounges($user_id);
            $table = $this->Display->createTable($result, false, false, false, true);
        }

        include './Views/Pages/Admin/Lounge/index.php';
    }

    public function index()
    {
        $role = isset($_SESSION['user']->role_id) ? $_SESSION['user']->role_id : null;
        $user_id = isset($_SESSION['user']->id) ? $_SESSION['user']->id : null;

        if ($role == 3) {
            // Bioscoop eigenaar
            $result = $this->Reservation->ownCinemasReservations($user_id);
            $table = $this->Display->createTable($result, false, false, true, false);
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
}
