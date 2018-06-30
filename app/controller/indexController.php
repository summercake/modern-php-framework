<?php

namespace app\controller;

use core\beauty;
use core\lib\model;
class indexController extends beauty
{
    public function index()
    {
        /*p('this is index controller index action');
        $model = new \core\lib\model;
        $sql = "SELECT * FROM user";
        $result = $model -> query($sql);
        p($result->fetchAll());

        $data = 'hello view page!!!';
        $title = 'view page';
        $this -> assign('title', $title);
        $this -> assign('data', $data);
        $this -> display('/index.html');
        //$temp = \core\lib\conf ::get('CONTROLLER', 'route');
        $temp = \core\lib\conf ::get('ACTION', 'route');
        p($temp);*/
        /*//$model = new model();
        //$data = $model -> select('user', '*');
        //dump($model);
        //dump($data);
        //$data = array(
        //    'name' => 'Beauty',
        //);
        //$result = $model -> insert('user', $data);
        //dump($result);

        //$model = new \app\model\userModel;
        //$result = $model -> lists();
        //dump($result);
        //$data = array(
        //    'name' => 'Honey',
        //);
        //$result = $model -> setOne(4, $data);
        //$result = $model -> delOne(4);
        //dump($result);*/

        $data = 'Hello World';
        $this -> assign('data', $data);
        $this -> display('index.html');
    }
}