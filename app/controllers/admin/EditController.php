<?php


namespace app\controllers\admin;

use app\models\News;


class EditController extends AppController
{

    public function indexAction()
    {
        $new = new News();

        $arNew = $new->allFile();
        $id = intval($this->route['id']);
        $q = $new->findOne($id);

        if(isset($id) && !empty($id) && is_numeric($id)){
            $img = '';
            foreach ($q as $value){
                $img = $value['image'];
            }
            $filesName = $_SERVER['DOCUMENT_ROOT'].'/public/foto/news/'.$img;

            if (file_exists($filesName))
            {
                unlink($filesName);
            }
            
            $idDelete= $new->getDeleteId($id);
            header("Location: /admin/edit");
            die();
        }

        $this->setVars(['arNew'=>$arNew]);
    }

    public function correctAction(){

        $id = intval($this->route['id']);

        $news = new News();
        $fots = null;

        if(isset($_POST['submit'])){

            if(isset($_POST['title']) && isset($_POST['text']) && isset($_POST['textTo']) && isset($_POST['alt'])
                && ($_POST['title'] != "" && $_POST['text'] != "" && $_POST['textTo'] != "" && $_POST['alt'] != ""))
            {

                if(isset($_FILES['foto']) &&$_FILES['foto']['error'] == 0){
                    $upload = $_SERVER['DOCUMENT_ROOT'] . '/public/foto/news/';
                    $arrName = explode('.',$_FILES['foto']['name']);
                    $name = $arrName[0].'_'.time().'.'.$arrName[1];
                    move_uploaded_file($_FILES['foto']['tmp_name'],$upload.$name);

                    $fots = $name;
                }
                $idNews = $id;
                $title =$_POST['title'];
                $preview = $_POST['text'];
                $text = $_POST['textTo'];
                $alt = $_POST['alt'];
                $img = $fots;

                $addEdit = $news->getEditId($title, $preview, $text, $img, $alt, $idNews);

                header("Location: /admin/edit");
                die();
            }
        }

        $result = $news->findOne($id );

        if(!empty($result)){
            $this->setVars(['arNews'=>$result[0]]);
        }


    }
}