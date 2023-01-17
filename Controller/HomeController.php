<?php
require_once './Models/Auth.php';
require_once './Models/Home.php';

class HomeController
{
    public function __construct()
    {
        $this->Auth = new Auth();
        $this->Home = new Home();
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
                case 'about_us':
                    $this->about_us();
                    break;
                case 'cookies':
                    $this->cookies();
                    break;
                case 'privacy_nl':
                    $this->privacy_nl();
                    break;
                case 'privacy_en':
                    $this->privacy_en();
                    break;
                case 'return_refund':
                    $this->return_refund();
                    break;
                case 'terms_conditions':
                    $this->terms_conditions();
                    break;
                case 'update':
                    $this->update_content();
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
        $result = $this->Home->collectDataHome()->fetchall(PDO::FETCH_ASSOC);
        include 'Views/Pages/home.php';

    }

    public function about_us()
    {
        include 'Views/Pages/about_us.php';
    }

    public function cookies()
    {
        include 'Views/Policy/termsfeed-cookies-policy-html-english.php';
    }

    public function privacy_nl()
    {
        include 'Views/Policy/termsfeed-privacy-policy-html-dutch.php';
    }

    public function privacy_en()
    {
        include 'Views/Policy/termsfeed-privacy-policy-html-english.php';
    }

    public function return_refund()
    {
        include 'Views/Policy/termsfeed-return-refund-policy-html-english.php';
    }


    public function terms_conditions()
    {
        include 'Views/Policy/termsfeed-terms-conditions-html-english.php';
    }

    public function update_content()
    {
        $role = isset($_SESSION['user']->role_id) ? $_SESSION['user']->role_id : null;
        $user_id = isset($_SESSION['user']->id) ? $_SESSION['user']->id : null;
        $result = $this->Home->collectDataHome()->fetchall(PDO::FETCH_ASSOC);

        if ($role == 4) {
            if (isset($_POST['submit'])) {
                $home_title = isset($_POST['home_title']) ? $_POST['home_title'] : null;
                $home_start_content = isset($_POST['start_content']) ? $_POST['start_content'] : null;
                $home_main_content = isset($_POST['main_content']) ? $_POST['main_content'] : null;

                $result = $this->Home->update($home_title, $home_start_content, $home_main_content);
                $result = $this->Home->collectDataHome()->fetchall(PDO::FETCH_ASSOC);
                header("Location: index.php");
            }

            include 'Views/Pages/Admin/Home/update.php';
        }
    }
}