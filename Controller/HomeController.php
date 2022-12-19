<?php
require_once 'Models/Auth.php';
require_once './Classes/Functions.php';

class HomeController
{
    public function __construct()
    {
        $this->Auth = new Auth();
        $this->Functions = new Functions();
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
                case 'registreer':
                    $this->registreren();
                    break;
                case 'login':
                    $this->login();
                    break;
                case 'cinemaDetails':
                    $this->cinemaDetails();
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
        include 'Views/Pages/home.php';
    }

    public function registreren()
    {
        include 'Views/Pages/registreer.php';
    }

    public function login()
    {
            include 'Views/Pages/login.php';
            $this->Functions->toast('test');
    }

    public function cinemaDetails()
    {
        include("Views/Pages/cinemaDetails.php");
    }
}
