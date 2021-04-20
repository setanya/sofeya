<?php


namespace app\controllers\admin;


use app\models\Paint;

class PaintController extends AppController
{
    public function indexAction(){
        $paint = new Paint();
        $foto = null;

        if(isset($_POST['submit']) && isset($_FILES['paint']))
        {
            if(isset($_POST['alt'], $_POST['title'], $_POST['text']) &&
            $_POST['alt'] !='' && $_POST['title'] !='' && $_POST['text'] !='' && $_FILES['paint']['error'] == 0)
            {
                $upload = $_SERVER['DOCUMENT_ROOT'] . '/public/foto/paint/';
                $arrName = explode('.',$_FILES['paint']['name']);
                $name = $arrName[0].'_'.time().'.'.$arrName[1];
                move_uploaded_file($_FILES['paint']['tmp_name'],$upload.$name);
                $foto = $name;

                $alt = $_POST['alt'];
                $title = $_POST['title'];
                $text = $_POST['text'];
                $img = $foto;
                $addPaint = $paint->addPaint($img, $alt, $title, $text);

                $_SESSION['end'] = "Материал добавлен";
                header("Location: /admin/paint");
                die();
            }
        }
    }

}