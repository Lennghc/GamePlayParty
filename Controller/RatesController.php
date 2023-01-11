<?php
require_once './Models/Rates.php';

class RatesController
{
    public function __construct()
    {
        $this->Rates = new Rates();
        $this->Cinema = new Cinema();
        $this->Display = new Display();
        $this->Validation = new Validation();
    }

    public function __destruct()
    {
    }

    public function handleRequest()
    {
        $action = isset($_GET['op']) ? $_GET['op'] : 'index';
        $id = isset($_GET['id']) ? $_GET['id'] : null;

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
            case 'delete':
                $this->delete($id);
                break;
            default:
                http_response_code(404);
                break;
        }
    }

    public function index()
    {
        $role = isset($_SESSION['user']->role_id) ? $_SESSION['user']->role_id : null;
        $user_id = isset($_SESSION['user']->id) ? $_SESSION['user']->id : null;

        if ($role == 3) {
            $result = $this->Rates->ownRates($user_id);
            $ratesTable = $this->Display->createTable($result, true, true, false, true);
        }

        include './Views/Pages/Admin/Rates/index.php';
    }

    public function create()
    {
        $user_id = isset($_SESSION['user']->id) ? $_SESSION['user']->id : null;
        $role = isset($_SESSION['user']->role_id) ? $_SESSION['user']->role_id : null;
        $cinema_id = $this->Cinema->hasCinema($user_id)->fetchall(PDO::FETCH_ASSOC);

        if ($role == 3) {

            if (isset($_POST['submit'])) {
                $rates_desc = isset($_POST['rates_desc']) ? $_POST['rates_desc'] : null;
                $rates_price = isset($_POST['rates_price']) ? $_POST['rates_price'] : null;

                $rates_price = str_replace(',', '.', $rates_price);
                $vali = $this->Validation->is_float($rates_price);

                if ($vali == NULL) {
                    Functions::toast('Gebruik alleen cijfers!', 'error', 'toast-top-right');
                } else {
                    $this->Rates->create($rates_desc, $rates_price, $cinema_id[0]['cinema_id']);
                    Functions::toast('Tarief aangemaakt!', 'success', 'toast-top-right');
                    header("Location: index.php?con=cms&op=rate");
                }
            }

            include './Views/Pages/Admin/Rates/create.php';
        } else {
            Functions::toast('Onbevoegd hiervoor!', 'error', 'toast-top-right');
            header("Location: index.php");
        }
    }

    public function update($id)
    {

        $role = isset($_SESSION['user']->role_id) ? $_SESSION['user']->role_id : null;

        if ($role == 3) {

            $data = $this->Rates->read($id)->fetchall(PDO::FETCH_ASSOC);

            if (isset($_POST['submit'])) {
                $rates_desc = isset($_POST['rates_desc']) ? $_POST['rates_desc'] : null;
                $rates_price = isset($_POST['rates_price']) ? $_POST['rates_price'] : null;

                $rates_price = str_replace(',', '.', $rates_price);
                $vali = $this->Validation->is_float($rates_price);

                if ($vali == NULL) {
                    Functions::toast('Gebruik alleen cijfers!', 'error', 'toast-top-right');
                } else {
                    $this->Rates->update($id, $rates_desc, $rates_price);
                    Functions::toast("Tarief met ID:{$id} success bewerkt!", 'success', 'toast-top-right');
                }
            }

            include './Views/Pages/Admin/Rates/update.php';
        } else {
            Functions::toast('Onbevoegd hiervoor!', 'error', 'toast-top-right');
            header("Location: index.php");
        }
    }

    public function delete($id)
    {
        $role = isset($_SESSION['user']->role_id) ? $_SESSION['user']->role_id : null;

        if ($role == 3) {
            $this->Rates->delete($id);
            Functions::toast("Tarief met ID:{$id} success verwijderd!", 'success', 'toast-top-right');
            header("Location: index.php?con=cms&op=rate");
        } else {
            Functions::toast('Onbevoegd hiervoor!', 'error', 'toast-top-right');
            header("Location: index.php");
        }
    }
}
