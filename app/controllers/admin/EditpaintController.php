<?php


namespace app\controllers\admin;


use app\models\Paint;

class EditpaintController extends AppController
{
    /**delete*/
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
    /** data correction*/

    public function correctAction(){
        $paint = new Paint();
        $id = intval($this->route['id']);

        $paintID = $paint->findOne($id );

        if(isset($_POST['submit']))
        {
            $idPaint = $id;
            $title = $_POST['title'];
            $text = $_POST['text'];
            $alt = $_POST['alt'];
            $img = null;

            if(isset( $_POST['title'], $_POST['text'], $_POST['alt']) && $_POST['title'] !='' && $_POST['text'] !='' && $_FILES['paint']['error'] == 4)
            {
                $updatePaint = $paint->getEditPaint($alt, $title, $text, $idPaint);
                header("Location: /admin/editpaint");
                die();
            }

            if(isset( $_POST['title'], $_POST['text'], $_POST['alt']) && $_POST['title'] !='' && $_POST['text'] !='' && $_FILES['foto']['error'] == 0)
            {
                if(isset($id) && !empty($id) && is_numeric($id))
                    {
                        $images = '';
                        foreach ($paintID as $value)
                        {
                            $images = $value['image'];
                        }

                        $filesPaint = $_SERVER['DOCUMENT_ROOT'].'/public/foto/paint/'. $images;

                        /**delete*/
                        if (file_exists($filesPaint))
                        {
                            unlink($filesPaint);
                        }
                        /**add*/
                        $upload = $_SERVER['DOCUMENT_ROOT'] . '/public/foto/paint/';
                        $arrPaint = explode('.',$_FILES['paint']['name']);
                        $name = $arrPaint[0].'_'.time().'.'.$arrPaint[1];
                        move_uploaded_file($_FILES['paint']['tmp_name'],$upload.$name);
                        $img = $name;
                    }

                $updatePaint = $paint->getUpPaint($img,$alt,$title,$text,$id);

                header("Location: /admin/editpaint");
                die();
            }
        }
        if(!empty($paintID))
        {
            $this->setVars(['arPaints'=>$paintID[0]]);
        }
    }
}