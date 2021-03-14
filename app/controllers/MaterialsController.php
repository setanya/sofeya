<?php


namespace app\controllers;


use app\models\Tools;
use system\libs\Pagination;
class MaterialsController extends AppController
{
    /**
     * decorative plaster page
     */
    public function plastersAction()
    {

    }

    /**
     * tools page
     */
    public function toolsAction()
    {
        $tool = new Tools();
        $c = $tool->allFile();
        $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
        $perPage = 10;
        $total = count($c);
        $pagination = '';
        if($total >= $perPage){
            $pagination = new Pagination($page, $perPage, $total);
            $start = $pagination->getStart();
            $arTools = $tool->findlLimitDesk($start, $perPage);
        }else{
            $arTools = $tool->allFile();
        }
        $this->setVars(['tools' => $arTools, 'pagination' => $pagination]);
    }
}