<?php

namespace app\model;

use core\lib\model;
class userModel extends model
{
    public $table = 'user';

    public function lists()
    {
        $result = $this -> select($this -> table, '*');
        return $result;
    }

    public function getOne($id)
    {
        $result = $this -> get($this -> table, '*', array(
            'id' => $id,
        ));
        return $result;
    }

    public function setOne($id, $data)
    {
        return $this -> update($this -> table, $data, array(
            'id' => $id,
        ));
    }

    public function delOne($id){
        return $this -> delete($this -> table, array(
            'id' => $id,
        ));
    }
}