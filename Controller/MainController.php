<?php
require_once 'HomeController.php';
require_once 'CinemaController.php';
require_once 'CmsController.php';


class MainController
{
    public function __construct()
    {
        $this->HomeController = new HomeController();
        $this->CinemaController = new CinemaController();
        $this->CmsController = new CmsController();
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


                default:
                    http_response_code(404);
                    break;
            }
        } catch (Exception $e) {
            throw $e;
        }
    }
}