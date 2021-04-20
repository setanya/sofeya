<?php


namespace app\models;


use system\core\Model;

class Portfolio extends Model
{
    public $table = 'images';

    /**
     * @param $start
     * @param $limit
     * @param $id
     * @return array
     */
    public function findDesk($start, $limit, $id)
    {
        $sql = "SELECT * FROM ". $this->table . " WHERE portfolio_id = $id ORDER BY id DESC  LIMIT $start, $limit";

        return $this->db->query($sql);
    }

    /**
     * @param $start
     * @param $limit
     * @param $id
     * @return array
     */
    public function findDecorId($start, $limit, $id)
    {
        $sql = "SELECT * FROM ". $this->table . " WHERE decor_id = $id ORDER BY id DESC  LIMIT $start, $limit";

        return $this->db->query($sql);
    }

    /**
     * @param $img
     * @param $alt
     * @param $title
     * @param $idCatecory
     * @param $idPortfolio
     * @return array
     */
    public function addImage($img, $alt, $title, $idCategory, $idPortfolio){

        $sql = "INSERT INTO {$this->table} SET image = ?, alt = ?, title = ?, decor_id = ?, portfolio_id = ?";

        return $this->db->exec($sql,[$img, $alt, $title, $idCategory, $idPortfolio]);
    }

    /**
     * @param $img
     * @param $alt
     * @param $title
     * @param $idCategory
     * @param $idPortfolio
     * @param $id
     * @return bool обновить с картинкой
     */
    public function upImgPortfolio($img, $alt, $title, $idCategory, $idPortfolio, $id){
        $sql = "UPDATE {$this->table} SET image = ?, alt = ?, title = ?, decor_id = ?, portfolio_id = ? WHERE `id`= ?";

        return $this->db->exec($sql,[$img, $alt, $title, $idCategory, $idPortfolio, $id]);
    }

    /**
     * @param $alt
     * @param $title
     * @param $idDecor
     * @param $idPortfolio
     * @param $id
     * @return bool обновить без картинки
     */
    public function upPortfolio($alt, $title, $idDecor, $idPortfolio, $id){
        $sql = "UPDATE {$this->table} SET alt = ?, title = ?, decor_id = ?, portfolio_id = ? WHERE `id`= ?";

        return $this->db->exec($sql,[$alt, $title, $idDecor, $idPortfolio, $id]);
    }

}
