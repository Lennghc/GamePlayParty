<?php
require_once 'HomeController.php';
require_once 'CinemaController.php';
require_once 'CmsController.php';
require_once 'ReservationController.php';
require_once 'LoungeController.php';
require_once 'AuthController.php';
require_once './Classes/Display.php';
require_once './Classes/Functions.php';
require_once './Classes/Validation.php';

class MainController
{
    public function __construct()
    {
        $this->HomeController = new HomeController();
        $this->CinemaController = new CinemaController();
        $this->CmsController = new CmsController();
        $this->ReservationController = new ReservationController();
        $this->LoungeController = new LoungeController();
        $this->AuthController = new AuthController();
        $this->Display = new Display();
    }
    public function __destruct()
    {
    }
    public function handleRequest()
    {
        try {

            $controller = isset($_GET['con']) ? $_GET['con'] : 'home';

            switch ($controller) {
                case 'home':
                    $this->HomeController->handleRequest();
                    break;
                case 'cinema':
                    $this->CinemaController->handleRequest();
                    break;
                case 'cms':
                    $this->CmsController->handleRequest();
                    break;
                case 'lounge':
                    $this->LoungeController->handleRequest();
                    break;
                case 'reserv':
                    $this->ReservationController->handleRequest();
                    break;
                case 'auth':
                    $this->AuthController->handleRequest();
                    break;
                case 'users';
                    $this->AuthController->handleRequest();
                    break;


                default:
                    http_response_code(404);
                    break;
            }
        } catch (Exception $e) {
            throw $e;
        }
    }
}
