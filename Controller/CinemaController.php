<?php
require_once './Models/Cinema.php';
require_once './Models/Lounge.php';
require_once './Models/Reservation.php';

class CinemaController
{
    public function __construct()
    {
        $this->Cinema = new Cinema();
        $this->Lounge = new Lounge();
        $this->Display = new Display();
        $this->Reservation = new Reservation();
        $this->Auth = new Auth();
    }

    public function __destruct()
    {
    }

    public function handleRequest()
    {
        try {

            $action = isset($_GET['op']) ? $_GET['op'] : 'index';
            $cinema_id = isset($_GET['id']) ? $_GET['id'] : '';


            switch ($action) {
                case 'index':
                    $this->index();
                    break;
                case 'create':
                    $this->create();
                    break;
                case 'read':
                    $this->read($cinema_id);
                    break;
                case 'update':
                    $this->update();
                    break;
                case 'details':
                    $this->details($cinema_id);
                    break;
                case 'activate':
                    $this->activate($cinema_id);
                    break;
                case 'deactivate':
                    $this->deactivate($cinema_id);
                    break;
                case 'readAll':
                    $this->readAll();
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
        $result = $this->Cinema->all();
        $list = $this->Display->createCinemaList($result);
        include 'Views/Pages/searchCinemas.php';
    }

    public function readAll()
    {
        $role = isset($_SESSION['user']->role_id) ? $_SESSION['user']->role_id : null;

        if ($role == 4) {
            $result = $this->Cinema->allAdmin();
            $table = $this->Display->createTable($result, false, false, false, false, true);
        } else {
            Functions::toast('Onbevoegd hiervoor', 'error', 'toast-top-right');
            header('Location: index.php');
            exit();
        }

        include './Views/Pages/Admin/Cinema/index.php';
    }

    public function details($cinema_id)
    {
        $result = $this->Lounge->timeSlots($cinema_id);
        $reservated = $this->Reservation->getReservatedTimeSlots();
        $button = $this->Display->createTimeslotButtons([$result, $reservated]);
        $result = $this->Cinema->read($cinema_id);
        $informationText = $this->Display->convertToText($result, true);
        // $sideBar = $this->Display->convertToSidebar($result);

        include 'Views/Pages/cinemaDetails.php';
    }



    public function create()
    {

        $user_id = isset($_SESSION['user']->id) ? $_SESSION['user']->id : null;

        $result = $this->Cinema->hasCinema($user_id);
        if ($result->rowCount() != 0) {
            // Naar index van de CMS gaan
            Functions::toast('1 Bioscoop per gebruiker', 'info', 'toast-top-right');
            header('Location: index.php?con=cms');
            exit();
        } else {
            $name = isset($_POST['cinema_name']) ? $_POST['cinema_name'] : null;
            $desc = isset($_POST['cinema_desc']) ? $_REQUEST['cinema_desc'] : null;
            $reachability = isset($_POST['cinema_reachabilty']) ? $_POST['cinema_reachabilty'] : null;

            if (isset($_REQUEST['submit'])) {
                $html = $this->Cinema->create($name, $desc, $reachability, $user_id);
            }

            include 'Views/Pages/Admin/Cinema/createCinema.php';
        }
    }
    public function read($cinema_id)
    {
        $result = $this->Cinema->readAdmin($cinema_id);
        $res = $this->Display->createTable($result);

        include 'Views/Pages/Admin/cms.php';
    }
    public function update()
    {
        $role = isset($_SESSION['user']->role_id) ? $_SESSION['user']->role_id : null;
        $user_id = isset($_SESSION['user']->id) ? $_SESSION['user']->id : null;

        if ($role == 3) {

            $dataCinema = $this->Cinema->read($user_id)->fetchall(PDO::FETCH_ASSOC);

            if (isset($dataCinema[0]['cinema_reachability'])) {
                $reach = json_decode($dataCinema[0]['cinema_reachability'], true);
            }

            // var_dump($this->Cinema->read($user_id));


            if (isset($_POST['submit'])) {
                $cinema_name = isset($_POST['cinema_name']) ? $_POST['cinema_name'] : null;
                $cinema_desc = isset($_POST['cinema_desc']) ? $_POST['cinema_desc'] : null;

                $open_dates = isset($_POST['open_dates']) ? $_POST['open_dates'] : null;
                $adres = isset($_POST['adres']) ? $_POST['adres'] : null;
                $reach_information = isset($_POST['reach_information']) ? $_POST['reach_information'] : null;
                $reach_car = isset($_POST['reach_car']) ? $_POST['reach_car'] : null;
                $reach_public_trafic = isset($_POST['reach_public_trafic']) ? $_POST['reach_public_trafic'] : null;
                $reach_bike = isset($_POST['reach_bike']) ? $_POST['reach_bike'] : null;
                $reach_wheel_chair = isset($_POST['reach_wheel_chair']) ? $_POST['reach_wheel_chair'] : null;;

                $array[1]['title'] = "Openingstijden";
                $array[1]['message'] = str_replace(array("\r", "\n", "'"), "", $open_dates);
                $array[2]['title'] = "Adres";
                $array[2]['message'] = str_replace(array("\r", "\n", "'"), "", $adres);;
                $array[3]['title'] = "Bereikbaarheid";
                $array[3]['message'] = str_replace(array("\r", "\n", "'"), "", $reach_information);;
                $array[4]['title'] = "Auto";
                $array[4]['message'] = str_replace(array("\r", "\n", "'"), "", $reach_car);;
                $array[5]['title'] = "Openbaar vervoer";
                $array[5]['message'] = str_replace(array("\r", "\n", "'"), "", $reach_public_trafic);;
                $array[6]['title'] = "Fiets";
                $array[6]['message'] = str_replace(array("\r", "\n", "'"), "", $reach_bike);;
                $array[7]['title'] = "Rolstoeltoegankelijkheid";
                $array[7]['message'] = str_replace(array("\r", "\n", "'"), "", $reach_wheel_chair);;


                $encodeArray = json_encode($array);

                $this->Cinema->update($user_id, $cinema_name, $cinema_desc, $encodeArray);

                header("Location: index.php?con=cinema&op=update");
            }

            include 'Views/Pages/Admin/Cinema/update.php';
        }
    }


    public function deactivate($cinema_id)
    {
        $result = $this->Cinema->deactivate($cinema_id);

        header('Location: index.php?con=cms&op=cinema');
        include 'Views/Pages/Admin/Cinema/index.php';
    }
    public function activate($cinema_id)
    {
        $result = $this->Cinema->activate($cinema_id);

        header('Location: index.php?con=cms&op=cinema');
        include 'Views/Pages/Admin/Cinema/index.php';
    }
}
