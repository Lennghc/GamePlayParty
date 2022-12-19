<?php
require_once 'HomeController.php';

class MainController {
    public function __construct() {
        $this->HomeController = new HomeController();
    }
    public function __destruct() {}
    public function handleRequest() {
        try{

            $controller = isset($_GET['con']) ? $_GET['con'] : 'home';

            switch ($controller) {
                case 'home':
                $this->HomeController->handleRequest();
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