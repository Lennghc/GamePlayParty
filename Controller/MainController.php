<?php
require 'Models/Main.php';

class MainController {
    public function __construct() {
        $this->Main = new Main();
    }
    public function __destruct() {}
    public function handleRequest() {
        try{

            $controller = isset($_GET['con']) ? $_GET['con'] : '';

            switch ($controller) {
                default:
                    include('Views/Pages/home.php');
                break;
            }

        } catch (Exception $e) {
            throw $e;
        }
    }
}