<?php


namespace app\controllers\admin;

use app\models\News;


class EditController extends AppController
{
    /**delete*/
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

    /** data correction*/
    public function correctAction(){
        $news = new News();
        $id = intval($this->route['id']);
        $result = $news->findOne($id );

        //$fots = null;

        if(isset($_POST['submit'])){

            $idNews = $id;
            $title =$_POST['title'];
            $preview = $_POST['text'];
            $text = $_POST['textTo'];
            $alt = $_POST['alt'];

            if(isset($_POST['title']) && isset($_POST['text']) && isset($_POST['textTo']) && isset($_POST['alt'])
                && ($_POST['title'] != "" && $_POST['text'] != "" && $_POST['textTo'] != "" && $_POST['alt'] != "")
            && (isset($_FILES['foto']) && $_FILES['foto']['error'] == 0))
            {
                if(isset($id) && !empty($id) && is_numeric($id)) {
                    $images = '';
                    foreach ($result as $value) {
                        $images = $value['image'];
                    }
                    $filesName = $_SERVER['DOCUMENT_ROOT'] . '/public/foto/news/' . $images;

                    if (file_exists($filesName)) {
                        unlink($filesName);
                    }
                    $upload = $_SERVER['DOCUMENT_ROOT'] . '/public/foto/news/';
                    $arrName = explode('.',$_FILES['foto']['name']);
                    $name = $arrName[0].'_'.time().'.'.$arrName[1];
                    move_uploaded_file($_FILES['foto']['tmp_name'],$upload.$name);
                }
                $img = $name;

                $addEdit = $news->getEditIdImg($title, $preview, $text, $img, $alt, $idNews);

                header("Location: /admin/edit");
                die();
            }
            if(isset($_POST['title']) && isset($_POST['text']) && isset($_POST['textTo']) && isset($_POST['alt'])
                && ($_POST['title'] != "" && $_POST['text'] != "" && $_POST['textTo'] != "" && $_POST['alt'] != "")
                && (isset($_FILES['foto']) && $_FILES['foto']['error'] == 4)){

                $addEdit = $news->getEditId($title, $preview, $text, $alt, $idNews);
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