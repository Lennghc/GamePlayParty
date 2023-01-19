<?php
require_once './Models/Lounge.php';

class LoungeController
{
    public function __construct()
    {
        $this->Lounge = new Lounge();
        $this->Display = new Display();
        $this->Cinema = new Cinema();
    }

    public function __destruct()
    {
    }

    public function handleRequest()
    {
        try {

            $action = isset($_GET['op']) ? $_GET['op'] : 'index';
            $id = isset($_GET['id']) ? $_GET['id'] : NULL;

            switch ($action) {
                case 'index':
                    $this->index();
                    break;
                case 'create':
                    $this->create();
                    break;
                case 'update':
                    $this->update($id);
                    break;
                case 'activate':
                    $this->activate($id);
                    break;
                case 'deactivate':
                    $this->deactivate($id);
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

        if ($role == 3) {
            $result = $this->Lounge->ownLounges($user_id);
            $table = $this->Display->createTable($result, true, false, false, true, true);
        }

        include './Views/Pages/Admin/Lounge/index.php';
    }

    public function create()
    {
        $user_id = isset($_SESSION['user']->id) ? $_SESSION['user']->id : null;

        $result = $this->Cinema->hasCinema($user_id)->fetchall(PDO::FETCH_ASSOC);

        if (isset($_POST['submit'])) {
            $lounge_nmr = isset($_POST['lounge_nmr']) ? $_POST['lounge_nmr'] : null;
            $lounge_chair_places = isset($_POST['lounge_chair_places']) ? $_POST['lounge_chair_places'] : null;
            $lounge_wheelchair_places = isset($_POST['lounge_wheelchair_places']) ? $_POST['lounge_wheelchair_places'] : null;
            $lounge_screensize = isset($_POST['lounge_screensize']) ? $_POST['lounge_screensize'] : null;

            $cinema_id = $result[0]['cinema_id'];

            $res = $this->Lounge->create($lounge_nmr, $lounge_chair_places, $lounge_wheelchair_places, $lounge_screensize, $cinema_id);
            Functions::toast('Zaal aangemaakt!', 'success', 'toast-top-right');
        }
        include 'Views/Pages/Admin/Lounge/create.php';
    }

    public function update($id)
    {
        if (isset($_POST['submit'])) {
            $lounge_nmr = isset($_POST['lounge_nmr']) ? $_POST['lounge_nmr'] : null;
            $lounge_chair_places = isset($_POST['lounge_chair_places']) ? $_POST['lounge_chair_places'] : null;
            $lounge_wheelchair_places = isset($_POST['lounge_wheelchair_places']) ? $_POST['lounge_wheelchair_places'] : null;
            $lounge_screensize = isset($_POST['lounge_screensize']) ? $_POST['lounge_screensize'] : null;

            $result = $this->Lounge->update($id, $lounge_nmr, $lounge_chair_places, $lounge_wheelchair_places, $lounge_screensize);

            if (!$result->errors) {
                Functions::toast($result->errors[0], 'error', 'toast-top-right');
            } else {
                Functions::toast('Zaal geupdate!', 'success', 'toast-top-right');
            }
        }

        $result = $this->Lounge->read($id);
        include 'Views/Pages/Admin/Lounge/update.php';
    }

    public function activate($id)
    {
        $result = $this->Lounge->activate($id);
        if (!$result->errors) {
            Functions::toast($result->errors[0], 'error', 'toast-top-right');
            header("Location: index.php?con=cms&op=lounge");
        } else {
            Functions::toast('Zaal actief!', 'success', 'toast-top-right');
            header("Location: index.php?con=cms&op=lounge");
        }
    }

    public function deactivate($id)
    {
        $result = $this->Lounge->deactivate($id);
        if (!$result->errors) {
            Functions::toast($result->errors[0], 'error', 'toast-top-right');
            header("Location: index.php?con=cms&op=lounge");
        } else {
            Functions::toast('Zaal inactief!', 'success', 'toast-top-right');
            header("Location: index.php?con=cms&op=lounge");
        }
    }
}
