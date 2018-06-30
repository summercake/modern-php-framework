<?php

namespace core\lib;

use core\lib\conf;
class log
{
    /**
     * 1. 确定日志的存储方式
     * 2. 写日志
     */
    static $class;

    public static function init()
    {
        $drive = conf ::get('DRIVE', 'log');
        $class = '\core\lib\drive\log\\'.$drive;
        p($class);
        self ::$class = new $class;
    }

    public static function log($name, $file = 'log')
    {
        self ::$class -> log($name, $file);
    }
}
