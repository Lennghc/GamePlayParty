<?php
require_once './Models/Content.php';

class ContentController
{
    public function __construct()
    {
        $this->Content = new Content();
        $this->Display = new Display();
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
                case 'updateAbout':
                    $this->updateAbout();
                    break;
                case 'updateAboutHandler':
                    $this->updateAboutHandler();
                    break;
                case 'updateHome':
                    $this->updateHome();
                    break;
                case 'updateHomeHandler':
                    $this->updateHomeHandler();
                    break;
                default:
                    http_response_code(404);
                    break;
            }
        } catch (Exception $e) {
            throw $e;
        }
    }

    public function updateAbout()
    {
        $result = $this->Content->collectContentPage(2);
        $display = $this->Display->pageUpdateForm($result, 'About Us', 'index.php?con=content&op=updateAboutHandler');
        include 'Views/Pages/Admin/Content/index.php';
    }

    public function updateAboutHandler()
    {
        $content_title = isset($_POST['content_title']) ? $_POST['content_title'] : NULL;
        $content_main = isset($_POST['content_main']) ? $_POST['content_main'] : NULL;
        $content_extra = isset($_POST['content_extra']) ? $_POST['content_extra'] : NULL;

        if (isset($_POST['submit'])) {
            $html = $this->Content->updateContent(2, htmlentities($content_title), htmlentities($content_main), htmlentities($content_extra));
            header("Location: index.php?con=content&op=updateAbout");
        }
    }

    public function updateHome()
    {
        $result = $this->Content->collectContentPage(1);
        $display = $this->Display->pageUpdateForm($result, 'Home', 'index.php?con=content&op=updateHomeHandler');
        include 'Views/Pages/Admin/Content/index.php';
    }

    public function updateHomeHandler()
    {
        $content_title = isset($_POST['content_title']) ? $_POST['content_title'] : NULL;
        $content_main = isset($_POST['content_main']) ? $_POST['content_main'] : NULL;
        $content_extra = isset($_POST['content_extra']) ? $_POST['content_extra'] : NULL;

        if (isset($_POST['submit'])) {
            $result = $this->Content->updateContent(1, htmlentities($content_title), htmlentities($content_main), htmlentities($content_extra));
            header("Location: index.php?con=content&op=updateHome");
        }
    }


    public function index()
    {
        $result = $this->Content->collectContentPage(1);
        $page = $this->Display->readPageContent($result,true);
        include 'Views/Pages/home.php';
    }

    public function about_us()
    {
        $result = $this->Content->collectContentPage(2);
        $page = $this->Display->readPageContent($result);
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
