<?php

namespace core;

class beauty
{
    public static $classMap = array();

    public static function run()
    {
        p('ok');
        $router = new \core\route();
    }

    public static function load($class)
    {
        // auto-loads libs
        p($class);
        p(BEAUTY.$class.'.php');
        if (isset($classMap[$class])) {
            return true;
        } else {
            $class = str_replace('\\', '/', $class);
            $file = BEAUTY.'\\'.$class.'.php';
            if (is_file($file)) {
                include $file;
                self::$classMap[$class] = $class;
            } else {
                return false;
            }
        }
    }
}