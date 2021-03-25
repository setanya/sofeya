<?php


namespace app\controllers\admin;


use app\models\Paint;

class EditpaintController extends AppController
{
    public function indexAction(){
        $paint = new Paint();
        $arPaint = $paint->allFile();
        $id = intval($this->route['id']);
        $editId = $paint->findOne($id);

        if(isset($id) && !empty($id) && is_numeric($id)){
            $img = '';
            foreach ($editId as $value){
                $img = $value['image'];
            }
            $filesName = $_SERVER['DOCUMENT_ROOT'].'/public/foto/paint/'.$img;

            if (file_exists($filesName))
            {
                unlink($filesName);
            }

            $idDelete= $paint->getDeleteId($id);
            header("Location: /admin/editpaint");
            die();
       }

        $this->setVars(['arPaint'=>$arPaint]);


    }

    public function correctAction(){
        $paint = new Paint();

        $id = intval($this->route['id']);

        $result = $paint->findOne($id );
        if(!empty($result)){

            $this->setVars(['arPaints'=>$result[0]]);
        }

        if(isset($_POST['submit']))
        {
            if(isset( $_POST['title'], $_POST['text']) && $_POST['title'] !='' && $_POST['text'] !='')
            {
                $idPaint = $id;
                $title = $_POST['title'];
                $text = $_POST['text'];

                $updatePaint = $paint->getEditPaint($title, $text, $idPaint);

                header("Location: /admin/editpaint");
                die();
            }
        }
    }
}