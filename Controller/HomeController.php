<?php
require_once 'Models/Auth.php';
require_once './Classes/Functions.php';
require_once './Classes/Validation.php';

class HomeController
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
                case 'registreer':
                    $this->registreren();
                    break;
                case 'handleregister':
                    $this->handleRegister();
                    break;
                case 'login':
                    $this->login();
                    break;
                case 'handleLogin':
                    $this->handleLogin();
                    break;
                case 'cinemaDetails':
                    $this->cinemaDetails();
                    break;
                case 'searchCinemas':
                    $this->searchCinemas();
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

    public function handleRegister()
    {

        $validation = new Validation();
        $validation->name('email')->pattern('email')->required();
        $validation->name('username')->pattern('alpha')->required();
        $password = $validation->name('password')->required()->return();
        $validation->name('password_confirmation')->required()->equal($password);

        $success = $validation->isSuccess();

        if ($success) {
            $result = $this->Auth->create($success->username, $success->email, $success->password);

            if (!isset($result->errors)) {
                echo Functions::toJSON(array(
                    'id' => $result
                ));

                exit;
            }
        }

        http_response_code(400);

        echo Functions::toJSON(array(
            'errors' => !$success ? $validation->result() : (!empty($result->errors) ? $result->errors : null)
        ));
    }

    public function login()
    {
        include 'Views/Pages/login.php';
    }

    public function handleLogin()
    {
        if(isset($_REQUEST['email'])) {
            $email = $_REQUEST['email'];
        }
        if(isset($_REQUEST['psw'])) {
            $password = $_REQUEST['psw'];
        }

        $res = $this->Auth->login($email,$password);
        include 'Views/Pages/test.php';
    }

    public function cinemaDetails()
    {
        include('Views/Pages/cinemaDetails.php');
    }
    public function searchCinemas()
    {
        include('Views/Pages/searchCinemas.php');
    }
}
