<?php


namespace app\controllers;


use app\models\Design;
use app\models\Portfolio;
use system\libs\Pagination;
class PortfolioController extends AppController
{
    /**
     * decorative finishing page
     */
    public function decorativeAction(){
       $decor= new Portfolio();
       $arrDecor = $decor->getImageByCategory('1');

        $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
        $perPage = 8;
        $total = count($arrDecor);
        $pagination = '';
        if($total >= $perPage){
            $pagination = new Pagination($page, $perPage, $total);
            $start = $pagination->getStart();
            $arDecor =$decor->findDesk($start, $perPage, 1);
        }else{
            $arDecor = $decor->getImageByCategory('1');
        }

        $this->setVars(['decor'=>$arDecor, 'pagination'=>$pagination]);
    }
    /**
     * samples of texture page
     */
    public function texturesAction(){

    }
    /**
     * Reliefs and Murals page
     */
    public function paintingAction(){
        $painting = new Portfolio();
        $arrPainting = $painting->getImageByCategory('2');

        $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
        $perPage = 6;
        $total = count($arrPainting);
        $pagination = '';
        if($total >= $perPage){
            $pagination = new Pagination($page, $perPage, $total);
            $start = $pagination->getStart();
            $arPainting =$painting->findDesk($start, $perPage, 2);
        }else{
            $arPainting = $painting->getImageByCategory('2');
        }

        $this->setVars(['painting'=>$arPainting, 'pagination'=>$pagination]);
    }
    /**
     * Baby themes page
     */
    public function babyAction(){
        $baby = new Portfolio();
        $arrB = $baby->getImageByCategory('3');

        $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
        $perPage = 6;
        $total = count($arrB);
        $pagination = '';
        if($total >= $perPage) {
            $pagination = new Pagination($page, $perPage, $total);
            $start = $pagination->getStart();
            $arBaby = $baby->findDesk($start, $perPage, 3);
        }else{
            $arBaby = $baby->getImageByCategory('3');
        }

        $this->setVars(['baby'=>$arBaby,
                        'pagination'=>$pagination]);
    }
    /**
     * My pictures page
     */
    public function picturesAction(){
        $pictur = new Portfolio();
        $pictures = $pictur ->getImageByCategory('4');

        $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
        $perPage = 6;
        $total = count($pictures);
        $pagination = '';
        if($total >= $perPage){
            $pagination = new Pagination($page, $perPage, $total);
            $start = $pagination->getStart();
            $arPictures =$pictur->findDesk($start, $perPage, 4);
        }else{
            $arPictures = $pictur ->getImageByCategory('4');
        }

        $this->setVars(['pictures'=>$arPictures,
            'pagination'=>$pagination]);
    }
    /**
     * Disign project page
     */
    public function designAction(){
        $project = new Design();

        $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
        $perPage = 4;
        $total = $project->count();
        $pagination = new Pagination($page, $perPage, $total);
        $start = $pagination->getStart();
        $arDesign = $project->findLimit($start, $perPage);

        $this->setVars(['project'=>$arDesign,
                        'pagination'=>$pagination]);
    }

}