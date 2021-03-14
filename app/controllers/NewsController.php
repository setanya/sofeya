<?php


namespace app\controllers;

use app\models\News;
use system\libs\Pagination;
class NewsController extends AppController
{
    /**
     * News page
     */
    public function viewAction(){
        $news = new News();

        $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
        $perPage = 3;
        $total = $news->count();
        $pagination = '';
        if($total >= $perPage){
            $pagination = new Pagination($page, $perPage, $total);
            $start = $pagination->getStart();
            $arNews = $news->findLimit($start, $perPage);
        }else{
            $arNews = $news->allFile();
        }
        $this->setVars(['news'=>$arNews , 'pagination'=>$pagination]);
    }

    /**
     * detailed news page
     */
    public function viewdatailAction(){

        $id = intval($this->route['id']);

        $news = new News();

        $result = $news->findOne($id );
        if(!empty($result)){
            $this->setVars(['arNews'=>$result[0]]);
        }
    }

}