<?php


namespace app\controllers\admin;


use app\models\Design;

class DesignController extends AppController
{

    public function indexAction(){
        $design = new Design();
        $foto = null;

        if(isset($_POST['submit']))
        {
            if(isset($_POST['alt']) && !empty($_POST['alt']))
            {
                if(isset($_FILES['design']) && (!empty($_FILES['design']))) {
                    if($_FILES['design']['error'] == 0){
                        $upload = $_SERVER['DOCUMENT_ROOT'] . '/public/foto/design/';
                        $arrName = explode('.',$_FILES['design']['name']);
                        $name = $arrName[0].'_'.time().'.'.$arrName[1];
                        move_uploaded_file($_FILES['design']['tmp_name'],$upload.$name);
                        $foto = $name;
                    }
                }
                $alt = $_POST['alt'];
                $img = $foto;

                $add = $design->addDesign($img, $alt);
                $_SESSION['end'] = 'Ландшафтный дизайн добавлен ';
                header("Location: /admin/design");
                die();
            }
        }
    }

}