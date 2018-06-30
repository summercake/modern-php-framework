<?php

namespace core\lib;

use core\lib\conf;
class route
{
    public $controller;
    public $action;

    public function __construct()
    {
        //p('this is route');
        // 一般URL xxx.com/index.php/index
        /**
         * 1. 隐藏 index.php
         * 2. 获取 URL 参数部分
         * 3. 返回对应的控制器和密码
         */
        if (isset($_SERVER['REQUEST_URI']) && $_SERVER['REQUEST_URI'] != '/') {
            $path = $_SERVER['REQUEST_URI'];
            $pathArr = explode('/', trim($path, '/'));
            // 获取 控制器
            if (isset($pathArr[0])) {
                $this -> controller = $pathArr[0];
            }
            // 获取 方法
            if (isset($pathArr[1])) {
                $this -> action = $pathArr[1];
            } else {
                $this -> action = conf ::get('ACTION', 'route');
            }
            // 获取 URL参数
            $count = count($pathArr);
            $i = 2;
            while ($i < $count) {
                if (isset($pathArr[$i + 1])) {
                    $_GET[$pathArr[$i]] = $pathArr[$i + 1];
                }
                $i = $i + 2;
            }
            //p($_GET);
        } else {
            $this -> controller = conf ::get('CONTROLLER', 'route');
            $this -> action = conf ::get('ACTION', 'route');
        }
    }
}