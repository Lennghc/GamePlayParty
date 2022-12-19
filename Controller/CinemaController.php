<?php
require_once './Models/Cinema.php';

class CinemaController
{
    public function __construct()
    {
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
                default:
                    http_response_code(404);
                    break;
            }
        } catch (Exception $e) {
            throw $e;
        }
    }
}
