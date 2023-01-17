<?php
require_once './Models/Auth.php';

class HomeController
{
    public function __construct()
    {
        $this->Auth = new Auth();
        $this->Content = new Content();
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
        $result = $this->Content->collectDataHome()->fetchall(PDO::FETCH_ASSOC);
        include 'Views/Pages/home.php';

    }

    public function about_us()
    {
        $result = $this->Content->collectDataAboutus()->fetchall(PDO::FETCH_ASSOC);
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
}