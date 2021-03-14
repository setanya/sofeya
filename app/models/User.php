<?php

namespace app\models;


use system\core\Model;

class User extends Model
{
    protected $table = 'users';

    /** return 'id'
     * user authorization in BD
     */
    public function auth($login, $pass)
    {
         $pass = md5($pass);

        $res = $this->db->query("SELECT * FROM {$this->table} WHERE `login` = ? AND `password` = ?", [$login, $pass]);
        if(!empty($res[0])){
            return $res[0]['id'];
        }
        return false;
    }
    /** admin authorization in website
     * @param $id //admin ID
     */
    public function login($id)
    {
        $res = $this->findOne($id);

        if(!empty($res[0])){
            $_SESSION['user']['login'] = $res[0]['login'];
            if($res[0]['login'] == 'admin'|| $res[0]['login'] == 'admin2'){
                $_SESSION['is_admin'] = 1;
            }
        }
    }
}