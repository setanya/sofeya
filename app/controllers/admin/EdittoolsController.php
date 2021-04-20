<?php


namespace app\controllers\admin;


use app\models\Tools;

class EdittoolsController extends AppController
{
    /**delete*/
    public function indexAction(){
        $tools = new Tools();
        $idTools = intval($this->route['id']);
        $oneTools = $tools->findOne($idTools);
        $arrTools = $tools->allFile();

        if(isset($idTools) && !empty($idTools) && is_numeric($idTools))
        {
            $tool = '';
            foreach ($oneTools as $value)
            {
                $tool = $value['image'];
            }
            $filesNames = $_SERVER['DOCUMENT_ROOT'].'/public/foto/design/'.$tool;

            if (file_exists($filesNames))
            {
                unlink($filesNames);
            }
            $idDeleteDes= $tools->getDeleteId($idTools);
            header("Location: /admin/edittools");
            die();
        }
        $this->setVars(['arTools'=>$arrTools]);
    }
    /** data correction*/
    public function correctAction(){
        $tools = new Tools();
        $idTools = intval($this->route['id']);
        $oneTools = $tools->findOne($idTools);

        if(isset($_POST['submit']))
        {
            $title = $_POST['title'];
            $text = $_POST['big_text'];
            $alt = $_POST['alt'];
            $img = "";

            if((isset( $_POST['title'], $_POST['big_text'], $_POST['alt'])) && $_POST['title'] !='' && $_POST['big_text'] !='' && $_FILES['user_file']['error'] == 4)
            {
                $updateTools = $tools->getEditPaint($alt, $title, $text, $idTools);
                header("Location: /admin/edittools");
                die();
            }
            if(isset( $_POST['title'], $_POST['big_text'], $_POST['alt']) && $_POST['title'] !='' && $_POST['big_text'] !='' && $_FILES['user_file']['error'] == 0)
            {
                if(isset($idTools) && !empty($idTools) && is_numeric($idTools))
                {
                    $images = '';
                    foreach ($oneTools as $value)
                    {
                        $images = $value['image'];
                    }

                    $filesPaint = $_SERVER['DOCUMENT_ROOT'].'/public/foto/tools/'. $images;

                    /**delete*/
                    if (file_exists($filesPaint))
                    {
                        unlink($filesPaint);
                    }
                    /**add*/
                    $upload = $_SERVER['DOCUMENT_ROOT'] . '/public/foto/tools/';
                    $arrTools = explode('.',$_FILES['user_file']['name']);
                    $name = $arrTools[0].'_'.time().'.'.$arrTools[1];

                    move_uploaded_file($_FILES['user_file']['tmp_name'],$upload.$name);
                    $img = $name;
                }
                $updatePaint = $tools->getUpPaint($img,$alt,$title,$text,$idTools);
                header("Location: /admin/edittools");
                die();
            }
        }
        if(!empty($oneTools))
        {
            $this->setVars(['arrTools'=>$oneTools[0]]);
        }
    }
}