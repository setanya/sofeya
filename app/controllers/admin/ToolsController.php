<?php


namespace app\controllers\admin;


use app\models\Tools;

class ToolsController extends AppController
{
    public function indexAction()
    {
        $tools = new Tools();
        $foto = null;

        if(isset($_POST['submit']) && isset($_FILES['user_file']))
        {
            if(isset($_POST['alt'], $_POST['title'], $_POST['big_text'])
               && $_POST['alt'] !='' && $_POST['title'] !='' && $_POST['big_text'] !='' && $_FILES['user_file']['error'] == 0)
            {
                $upload = $_SERVER['DOCUMENT_ROOT'] . '/public/foto/tools/';
                $arrName = explode('.',$_FILES['user_file']['name']);
                $name = $arrName[0].'_'.time().'.'.$arrName[1];
                move_uploaded_file($_FILES['user_file']['tmp_name'],$upload.$name);
                $foto = $name;

                $alt = $_POST['alt'];
                $title = $_POST['title'];
                $text = $_POST['big_text'];
                $img = $foto;
                $add = $tools->getStr($img, $alt, $title, $text);

                $_SESSION['end'] = "Инструмент добавлен";
                header("Location: /admin/tools");
                die();
            }
        }
    }
}