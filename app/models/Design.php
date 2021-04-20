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

    public function upDesign($img, $alt, $id){

        $sql = "UPDATE {$this->table} SET image = ?, alt = ? WHERE id = ?";

        return $this->db->exec($sql, [$img, $alt, $id]);
    }
    public function editDesign($alt, $id){

        $sql = "UPDATE {$this->table} SET alt = ? WHERE id = ?";

        return $this->db->exec($sql, [ $alt, $id]);
    }
}