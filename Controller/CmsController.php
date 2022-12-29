<?php

class CmsController
{
    public function __construct()
    {
        $this->AuthController = new AuthController();
        $this->ReservationController = new ReservationController();
        $this->CinemaController = new CinemaController();
        $this->LoungeController = new LoungeController();
    }
    public function __destruct()
    {
    }
    public function handleRequest()
    {
        try {

            $action = isset($_GET['op']) ? $_GET['op'] : 'index';
            $id = isset($_GET['id']) ? $_GET['id'] : null;

            switch ($action) {
                case 'index':
                    $this->ReservationController->handleRequest();
                    break;
                case 'lounge':
                    $this->LoungeController->index();
                    break;
                case 'cinema':
                    $this->CinemaController->readAll();
                    break;
                case 'users':
                    $this->AuthController->index();
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
