<?php


namespace app\controllers;


use app\models\Portfolio;
use system\libs\Pagination;
class TextureController extends AppController
{
    /**
     * textured page
     */
    public function oneAction(){
        $texture = new Portfolio();

        $oneId = $texture->getImageByTexture('1');
        $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
        $perPage = 8;
        $total = count($oneId);
        $pagination = new Pagination($page, $perPage, $total);
        $start = $pagination->getStart();
        $arOne =$texture->findDecorId($start, $perPage, 1);

        $this->setVars(['one'=>$arOne,'pagination'=>$pagination]);

    }

    /**
     * even page
     */
    public function secondAction(){
        $texture2 = new Portfolio();

        $second = $texture2->getImageByTexture('2');
        $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
        $perPage = 8;
        $total = count($second);
        $pagination = new Pagination($page, $perPage, $total);
        $start = $pagination->getStart();
        $secondId =$texture2->findDecorId($start, $perPage, 2);

        $this->setVars(['second'=>$secondId,'pagination'=>$pagination]);
    }

    /**
     * stone page
     */
    public function treeAction(){
        $texture = new Portfolio();

        $tree = $texture->getImageByTexture('3');
        $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
        $perPage = 8;
        $total = count($tree);
        $pagination = new Pagination($page, $perPage, $total);
        $start = $pagination->getStart();
        $treeId =$texture->findDecorId($start, $perPage, 3);

        $this->setVars(['tree'=>$treeId,'pagination'=>$pagination]);

    }

    /**
     * exclusive page
     */
    public function fourAction(){
        $texture = new Portfolio();

        $four = $texture->getImageByTexture('4');
        $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
        $perPage = 8;
        $total = count($four);
        $pagination = new Pagination($page, $perPage, $total);
        $start = $pagination->getStart();
        $fourId =$texture->findDecorId($start, $perPage, 4);

        $this->setVars(['four'=>$fourId,'pagination'=>$pagination]);

    }
}