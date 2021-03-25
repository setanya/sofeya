<?php


namespace system\core;


abstract class Model
{
    protected $db;
    protected $table;
    protected $pk = 'id';


    public function __construct()
    {
        $this->db = Db::instance();
    }

    public function query($sql)
    {
        return $this->db->exec($sql);
    }

    /**
     * @return array
     */
    public function findAll()
    {
        $sql = "SELECT * FROM ". $this->table;
       return $this->db->query($sql);
    }

    /**
     * @return array / выбрать всё из таблицы и отсортировать по ади
     */
    public function allFile()
    {
        $sql = "SELECT * FROM ". $this->table . " ORDER BY id DESC";
        return $this->db->query($sql);
    }

    /**
     * @param $start
     * @param $limit
     * @return array
     */
    public function findLimit($start, $limit)
    {
        $sql = "SELECT * FROM ". $this->table . " LIMIT $start, $limit";
        return $this->db->query($sql);
    }

    /**
     * @param $start
     * @param $limit
     * @return array
     */
    public function findlLimitDesk($start, $limit)
    {
        $sql = "SELECT * FROM ". $this->table . " ORDER BY id DESC  LIMIT $start, $limit";
        return $this->db->query($sql);
    }
    /**
     * @param array $params
     * @return mixed
     */
    public function count($params = [])
    {
       $arr = $this->findAll();
       return count($arr);
    }

    /**
     * @param $id
     * @param string $pk
     * @return array
     */
    public function findOne($id, $pk = '')
    {
        if($pk != ''){
            $this->pk = $pk;
        }
        $sql = "SELECT * FROM {$this->table} WHERE {$this->pk} = ? LIMIT 1";
        return $this->db->query($sql, [$id]);
    }


    /**
     * @param $CategoryId
     * @return array
     */
    public function getImageByCategory($CategoryId)
    {
        $sql = "SELECT * FROM {$this->table} WHERE portfolio_id = ?  ORDER BY id DESC";
        return $this->db->query($sql, [$CategoryId]);
    }
    /**
     * @param $id
     * @return array
     */
    public function getImageByTexture($id)
    {
        $sql = "SELECT * FROM {$this->table} WHERE decor_id = ?  ORDER BY id DESC";
        return $this->db->query($sql, [$id]);
    }
    /**
     * @param $img
     * @param $alt
     * @param $title
     * @param $text
     * @return bool
     */
    public function getStr($img, $alt, $title, $text )
    {
        $sql = "INSERT INTO {$this->table} SET image = '$img', alt = '$alt', title = '$title', text = '$text', DATA = NOW()";

       return $this->db->exec($sql,[$img, $alt, $title, $text]);
    }

    public function getPaint($img, $alt, $title, $text ){
        $sql = "INSERT INTO {$this->table} SET image = '$img', alt = '$alt', title = '$title', text = '$text'";

        return $this->db->exec($sql,[$img, $alt, $title, $text]);
    }
    public function getEditPaint($title, $text, $id ){
        $sql = "UPDATE {$this->table} SET title = ?, text = ?  WHERE `id`= ?";

        return $this->db->exec($sql,[$title, $text, $id]);
    }

    public function getEditId($title, $preview, $text, $img, $alt, $id)
    {
        $sql = "UPDATE {$this->table} SET title =?, preview = ?, text = ?, image = ?, alt= ?, DATA = NOW()  WHERE `id`= ?";
        return $this->db->exec($sql, [$title, $preview, $text, $img, $alt, $id]);
    }

    public function getDeleteId($id)
    {
        $sql = "DELETE FROM {$this->table} WHERE `id` = ? ";

        return $this->db->exec($sql, [$id]);
    }

}