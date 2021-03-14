<?php


namespace app\controllers\admin;


use app\models\News;

class NewsController extends AppController
{
    public function indexAction()
    {
        $news = new News();
        $fots = null;

        if(isset($_POST['submit'])){

            if(isset($_POST['title']) && isset($_POST['text']) && isset($_POST['textTo']) && isset($_POST['alt'])
                && ($_POST['title'] != "" && $_POST['text'] != "" && $_POST['textTo'] != "" && $_POST['alt'] != "" && ($_FILES['foto']['error'] == 0)))
            {
                if(isset($_FILES['foto']) &&$_FILES['foto']['error'] == 0){
                    $upload = $_SERVER['DOCUMENT_ROOT'] . '/public/foto/news/';
                    $arrName = explode('.',$_FILES['foto']['name']);
                    $name = $arrName[0].'_'.time().'.'.$arrName[1];
                    move_uploaded_file($_FILES['foto']['tmp_name'],$upload.$name);

                    $fots = $name;
                }

                $title =$_POST['title'];
                $preview = $_POST['text'];
                $text = $_POST['textTo'];
                $alt = $_POST['alt'];
                $img = $fots;

                $add = $news->addNews($title, $preview, $text, $img, $alt);
                $_SESSION['end'] = 'Новость добавлена';
                header("Location: /admin/news");
                die();
            }
        }
    }

}