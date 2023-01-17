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
            $content_id = isset($_GET['id']) ? $_GET['id'] : '';


            switch ($action) {
                case 'aboutus':
                    $this->index();
                    break;
                case 'updateAbout':
                    $this->updateContentAbout();
                    break;
                case 'home':
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

    public function index() {
        $content_id = isset($_REQUEST['content_id']) ? $_REQUEST['content_id'] : 1;
        $result = $this->Content->readallAboutContent($content_id)->fetchAll(PDO::FETCH_ASSOC);
        include 'Views/Pages/Admin/Content/index.php';

    }

    public function updateContentAbout() {
        $content_id = isset($_REQUEST['content_id']) ? $_REQUEST['content_id'] : NULL;
        $about_title = isset($_REQUEST['About_title']) ? $_REQUEST['About_title'] : NULL;
        $about_main_content = isset($_REQUEST['About_main_content']) ? $_REQUEST['About_main_content'] : NULL;
        $about_contact_info = isset($_REQUEST['About_contact_info']) ? $_REQUEST['About_contact_info'] : NULL;

        if(isset($_POST['submit'])) {
            $html = $this->Content->updateContent($content_id, $about_title, $about_main_content, $about_contact_info);
            header("Location: index.php?con=cms&op=content");
        }
    }

    public function update_content()
    {
        $role = isset($_SESSION['user']->role_id) ? $_SESSION['user']->role_id : null;
        $user_id = isset($_SESSION['user']->id) ? $_SESSION['user']->id : null;
        $result = $this->Content->collectDataHome()->fetchall(PDO::FETCH_ASSOC);

        if ($role == 4) {
            if (isset($_POST['submit'])) {
                $home_title = isset($_POST['home_title']) ? $_POST['home_title'] : null;
                $home_start_content = isset($_POST['start_content']) ? $_POST['start_content'] : null;
                $home_main_content = isset($_POST['main_content']) ? $_POST['main_content'] : null;

                $result = $this->Content->update($home_title, $home_start_content, $home_main_content);
                $result = $this->Content->collectDataHome()->fetchall(PDO::FETCH_ASSOC);
                header("Location: index.php");
            }

            include 'Views/Pages/Admin/Home/update.php';
        }
    }
}
