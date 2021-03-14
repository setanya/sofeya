<?php


namespace app\models;


use system\core\Model;

class Design extends Model
{
    public $table = 'design';

    public function addDesign($img, $alt){

        $sql = "INSERT INTO {$this->table} SET image = '$img', alt = '$alt'";

        return $this->db->exec($sql, [$img, $alt]);
    }

}