<?php


namespace app\controllers\admin;


use app\models\Design;

class EditdesignController extends AppController
{
    /**delete*/
    public function indexAction(){
        $design = new Design();
        $arDesign = $design->allFile();

        $idDes = intval($this->route['id']);
        $oneDes = $design->findOne($idDes);

        if(isset($idDes) && !empty($idDes) && is_numeric($idDes))
        {
            $picture = '';
            foreach ($oneDes as $value)
            {
                $picture = $value['image'];
            }
            $filesNames = $_SERVER['DOCUMENT_ROOT'].'/public/foto/design/'.$picture;

            if (file_exists($filesNames))
            {
                unlink($filesNames);
            }
            $idDeleteDes= $design->getDeleteId($idDes);
            header("Location: /admin/editdesign");
            die();
        }
        $this->setVars(['arDesign'=>$arDesign]);
    }
    /** data correction*/
    public function correctAction(){
        $design = new Design();

        $idDes = intval($this->route['id']);
        $oneDesign = $design->findOne($idDes);
        $alt = $_POST['alt'];
        $img = "";
            if(isset($_POST['submit']))
            {
                if((isset($_POST['alt']) && !empty($_POST['alt'])) && (isset($_FILES['design']) && $_FILES['design']['error'] == 0))
                {
                    if(isset($idDes) && !empty($idDes) && is_numeric($idDes))
                    {
                        $image = '';
                        foreach ($oneDesign as $value)
                        {
                            $image = $value['image'];
                        }
                        $fileName = $_SERVER['DOCUMENT_ROOT'] . '/public/foto/design/' . $image;

                        if (file_exists($fileName))
                        {
                            unlink($fileName);
                        }
                        $upload = $_SERVER['DOCUMENT_ROOT'] . '/public/foto/design/';
                        $arrName = explode('.',$_FILES['design']['name']);
                        $name = $arrName[0].'_'.time().'.'.$arrName[1];
                        move_uploaded_file($_FILES['design']['tmp_name'],$upload.$name);
                        $img = $name;
                    }
                    $add = $design->upDesign($img, $alt, $idDes);

                    header("Location: /admin/editdesign");
                   die();
                }
                if((isset($_POST['alt']) && !empty($_POST['alt'])) && (isset($_FILES['design']) && $_FILES['design']['error'] == 4))
                {
                    $addEdit = $design->editDesign($alt, $idDes);
                    header("Location: /admin/editdesign");
                    die();
                }
            }
            if(!empty($oneDesign))
            {
                $this->setVars(['arOneDesign'=>$oneDesign[0]]);
            }
    }
}