<?php

require_once './Models/Auth.php';

class AuthController
{
    public function __construct()
    {
        $this->Auth = new Auth();
        $this->Display = new Display();
    }

    public function __destruct()
    {
    }

    public function handleRequest()
    {
        try {

            $action = isset($_GET['op']) ? $_GET['op'] : 'index';
            $user = isset($_SESSION['user']->id) ? $_SESSION['user']->id : null;
            $id = isset($_GET['id']) ? $_GET['id'] : $user;
            $secret = isset($_GET['secret']) ? $_GET['secret'] : null;

            switch ($action) {
                case 'index':
                    $this->index();
                    break;
                case 'registreer':
                    $this->registreren($secret);
                    break;
                case 'handleregister':
                    $this->handleRegister();
                    break;
                case 'login':
                    $this->login();
                    break;
                case 'handlelogin':
                    $this->handleLogin();
                    break;
                case 'update';
                    $this->update($id);
                    break;
                case 'logout':
                    $this->logout();
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
        $role = isset($_SESSION['user']->role_id) ? $_SESSION['user']->role_id : null;
        $user_id = isset($_SESSION['user']->id) ? $_SESSION['user']->id : null;

        if ($role == 4) {
            $result = $this->Auth->all($user_id);
            $table = $this->Display->createTable($result, true);
        } else {
            Functions::toast('Onbevoegd hiervoor', 'error', 'toast-top-right');
            header('Location: index.php');
            exit();
        }

        include './Views/Pages/Admin/Users/index.php';
    }

    public function registreren($secret)
    {
        if ($secret === 'GamePlayParty2023') {
            include 'Views/Pages/registreer.php';
        } else {
            http_response_code(404);
        }
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

        $validation = new Validation();
        $validation->name('email')->pattern('email')->required();
        $validation->name('password')->required()->return();

        $success = $validation->isSuccess();

        if ($success) {
            $result = $this->Auth->login($success->email, $success->password);

            if (!isset($result->errors)) {
                echo Functions::toJSON(array(
                    'username' => $result['user_username']
                ));

                exit;
            }
        }

        echo Functions::toJSON(array(
            'errors' => !$success ? $validation->result() : (!empty($result->errors) ? $result->errors : null)
        ));
    }

    public function update($id)
    {
        $role = isset($_SESSION['user']->role_id) ? $_SESSION['user']->role_id : null;

        if ($role == 4) {
            $result = $this->Auth->collectUserData($id);
        } else {
            Functions::toast('Onbevoegd hiervoor', 'error', 'toast-top-right');
            header('Location: index.php');
            exit();
        }

        // if (isset($_POST['submit'])) {
        //     $fName = isset($_POST['fName']) ? $_POST['fName'] : null;
        //     $mName = isset($_POST['mName']) ? $_POST['mName'] : null;
        //     $lName = isset($_POST['lName']) ? $_POST['lName'] : null;
        //     $street = isset($_POST['street']) ? $_POST['street'] : null;
        //     $house_nmr = isset($_POST['houseNumber']) ? $_POST['houseNumber'] : null;
        //     $zipcode = isset($_POST['zipcode']) ? $_POST['zipcode'] : null;
        //     $city = isset($_POST['city']) ? $_POST['city'] : null;
        //     $tel = isset($_POST['tel']) ? $_POST['tel'] : null;

        //     $role_id = isset($_POST['role']) ? $_POST['role'] : $_SESSION['user']->role_id;

        //     $this->Auth->update($id, $fName, $mName, $lName, $street, $house_nmr, $zipcode, $city, $tel, $role_id);
        //     Functions::toast("ID: {$id} met success bijgewerkt!", 'success', 'toast-top-right');
        //     header('Location: index.php?con=cms');
        //     exit();
        // }

        include 'Views/Pages/Admin/Users/update.php';
    }

    public function logout()
    {
        if (isset($_SESSION['user'])) {
            unset($_SESSION['user']);
        }

        header('location: ' . PATH_URL);
    }
}
