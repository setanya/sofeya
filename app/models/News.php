<?php


namespace app\models;


use system\core\Model;

class News extends Model
{
   public $table = 'news';

    /**
     * @param $title/ title news
     * @param $preview/preview text
     * @param $text/continuation of the text
     * @param $img/picture
     * @param $alt/ brief description
     * @return array/ add to the database
     */
    public function addNews($title, $preview, $text, $img, $alt){

       $sql = "INSERT INTO {$this->table} SET title ='$title', preview = '$preview', text = '$text', image = '$img', alt= '$alt', DATA = NOW()";

        return $this->db->exec($sql,[$title, $preview, $text, $img, $alt]);

    }
    /**
     * @param $Id
     * @return bool
     */
    public function getNewsByCategory($Id)
    {
        $sql = "SELECT * FROM {$this->table} WHERE `id` = ?";

        return $this->db->exec($sql, [$Id]);
    }
}