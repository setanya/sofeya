<?php


namespace app\controllers;


use app\models\Paint;
use system\libs\Pagination;
class PaintController extends AppController
{
    public function paintAction(){
        $paint = new Paint();
        $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
        $perPage = 6;
        $total = $paint->count();
        $pagination = '';
        if($total >= $perPage){
            $pagination = new Pagination($page, $perPage, $total);
            $start = $pagination->getStart();
            $arPaint = $paint->findlLimitDesk($start, $perPage);
        }else{
            $arPaint = $paint->allFile();
        }
        $this->setVars(['paint' => $arPaint,
            'pagination' => $pagination]);
    }
}