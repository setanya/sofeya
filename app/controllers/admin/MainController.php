<?php


namespace app\controllers\admin;


use app\models\Category;

use app\models\Kindsdecora;
use app\models\Portfolio;
use app\models\User;

class MainController extends AppController
{
    /**
     * Form Portfolio page
     */
    public function indexAction()
    {
        $category = new Category();
        $images = new Portfolio();
        $decor = new Kindsdecora();
        $foto = null;

        if(isset($_POST['submit'])){

            if(isset( $_POST['nameDecor'], $_POST['alt'], $_POST['categoryPortfolio'])
             && !empty($_POST['nameDecor']) && !empty($_POST['alt']) && !empty ($_POST['categoryPortfolio']))
            {
                if(isset($_FILES['portfolio']) && (!empty($_FILES['portfolio']))){
                    if($_FILES['portfolio']['error'] == 0){
                        $upload = $_SERVER['DOCUMENT_ROOT'] . '/public/foto/images/';
                        $arrName = explode('.',$_FILES['portfolio']['name']);
                        $name = $arrName[0].'_'.time().'.'.$arrName[1];
                        move_uploaded_file($_FILES['portfolio']['tmp_name'],$upload.$name);
                        $foto = $name;
                    }
                }
                    $idPortfolio = $_POST['categoryPortfolio'];
                    $titleDecor = $_POST['nameDecor'];
                    $idCategory = $_POST['categoryImage'];
                    $alt = $_POST['alt'];
                    $img = $foto;

                    $addImg = $images->addImage($img, $alt, $titleDecor, $idCategory, $idPortfolio );
                    $_SESSION['end']   = 'Изображение декора добавленно ';
                    header("Location: /admin/main");
                    die();
            }
        }
        $arCat = $category->findAll();
        $arDez = $decor->findAll();
        $this->setVars(['arCat'=>$arCat, 'arDez'=>$arDez]);

    }

    /**
     * Login Admin page
     */
    public function loginAction()
    {
        $this->layout = 'admin_login';

        $user = new User();

        if (isset($_POST['login'], $_POST['password'], $_POST['dbl_password'])){
            if ($_POST['login'] != '' && $_POST['password'] != '' && $_POST['dbl_password'] != '' && ($_POST['password'] == $_POST['dbl_password'])){
                $id = $user->auth($_POST['login'], $_POST['password']);
                if(false !== $id){
                     $user->login($id);
                     header("Location: /admin");
                     die();
                }else{
                    $_SESSION['error'] = 'Неверный логин / пароль';
                }
            }else{
                $_SESSION['error'] = 'Введите логин/пароль';
            }
        }
    }

}