<?php
require_once './Models/Cinema.php';
require_once './Models/Lounge.php';
require_once './Classes/Display.php';

class CinemaController
{
    public function __construct()
    {
        $this->Cinema = new Cinema();
        $this->Lounge = new Lounge();
        $this->Display = new Display();
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
                case 'details':
                    $this->detailCinema($cinema_id);
                    break;
                case 'index':
                    $this->allCinema();
                    break;
                default:
                    http_response_code(404);
                    break;
            }
        } catch (Exception $e) {
            throw $e;
        }
    }

    public function detailCinema($cinema_id)
    {
        $result = $this->Lounge->timeSlots($cinema_id);
        $button = $this->Display->createTimeslotButtons($result);

        $result = $this->Cinema->read($cinema_id);
        $informationText = $this->Display->convertToText($result);
        include 'Views/Pages/cinemaDetails.php';
    }

    public function allCinema()
    {
        $result = $this->Cinema->all();
        $list = $this->Display->createCinemaList($result);
        include 'Views/Pages/searchCinemas.php';
    }
}
