<?php
require_once 'Models/Auth.php';
require_once './Classes/Functions.php';
require_once './Classes/Validation.php';

class CmsController
{
    public function __construct()
    {
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
        include 'Views/Pages/cms.php';

    }
   
}
