<?php


namespace app\controllers\admin;


use app\models\Category;
use app\models\Kindsdecora;
use app\models\Portfolio;

class EditportfolioController extends AppController
{
    public function indexAction(){
        $category = new Category();
        $images = new Portfolio();
        $decor = new Kindsdecora();

        $idPortfolio = intval($this->route['id']);
        $onePortfolio = $images->findOne($idPortfolio);

        if(isset($idPortfolio) && !empty($idPortfolio) && is_numeric($idPortfolio))
        {
            $img = '';
            foreach ($onePortfolio as $value)
            {
                $img = $value['image'];
            }
            $filesNames = $_SERVER['DOCUMENT_ROOT'].'/public/foto/images/'.$img;

            if (file_exists($filesNames))
            {
                unlink($filesNames);
            }
            $idDeleteDes= $images->getDeleteId($idPortfolio);
            header("Location: /admin/editportfolio");
            die();
        }
        $arCategory = $category->findAll();
        $arDecor = $decor->findAll();
        $arImages = $images->allFile();
        $this->setVars(['arrCategory'=>$arCategory, 'arrDecor'=>$arDecor, 'arrImg' =>$arImages]);
    }

    public function correctAction(){
        $category = new Category();
        $images = new Portfolio();
        $decor = new Kindsdecora();

        $id = intval($this->route['id']);
        $onePortfolio = $images->findOne($id);
        $idPortfolio = $_POST['categoryPortfolio'];
        $titleDecor = $_POST['nameDecor'];
        $idCategory = $_POST['categoryImage'];
        $alt = $_POST['alt'];

        if(isset($_POST['submit']))
        {
            if(isset( $_POST['nameDecor'], $_POST['alt'], $_POST['categoryPortfolio'], $_FILES['portfolio'])
                && !empty($_POST['nameDecor']) && !empty($_POST['alt']) && !empty ($_POST['categoryPortfolio'])
                && ($_FILES['portfolio']['error'] == 0))
            {
                if(isset($id) && !empty($id) && is_numeric($id))
                {
                    $image = '';
                    foreach ($onePortfolio as $value)
                    {
                        $image = $value['image'];
                    }
                    $fileName = $_SERVER['DOCUMENT_ROOT'] . '/public/foto/images/' . $image;

                    if (file_exists($fileName))
                    {
                        unlink($fileName);
                    }
                        $upload = $_SERVER['DOCUMENT_ROOT'] . '/public/foto/images/';
                        $arrName = explode('.',$_FILES['portfolio']['name']);
                        $name = $arrName[0].'_'.time().'.'.$arrName[1];
                        move_uploaded_file($_FILES['portfolio']['tmp_name'],$upload.$name);
                }
                $img =$name;


                    $addImg = $images->upImgPortfolio($img, $alt, $titleDecor, $idCategory, $idPortfolio, $id);


                header("Location: /admin/editportfolio");
                die();
            }
//
            if(isset( $_POST['nameDecor'], $_POST['alt'], $_POST['categoryPortfolio']) && !empty($_POST['nameDecor'])
                && !empty($_POST['alt']) && !empty ($_POST['categoryPortfolio']) && ($_FILES['portfolio']['error'] == 4))//без картинки
            {

                   $yesCategory = $images->upPortfolio($alt, $titleDecor, $idCategory, $idPortfolio, $id);


                header("Location: /admin/editportfolio");
                die();
            }
        }
        $arCategory = $category->findAll();
        $arDecor = $decor->findAll();
        if(!empty($onePortfolio))
        {
            $this->setVars(['arrOnePortfolio'=>$onePortfolio[0], 'arCat'=>$arCategory, 'arDecor'=>$arDecor]);
        }

    }

}