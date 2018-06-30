<?php

namespace core\lib;

class conf
{
    public static $conf = array();

    public static function get($name, $file)
    {
        /**
         * 1. 判断配置文件是否存在
         * 2. 判断配置是否存在
         * 3. 缓存配置
         */
        if (isset(self ::$conf[$file])) {
            return self ::$conf[$file][$name];
        } else {
            $path = BEAUTY.'/core/config/'.$file.'.php';
            if (is_file($path)) {
                $conf = include $path;
                if (isset($conf[$name])) {
                    self ::$conf[$file] = $conf;
                    return $conf[$name];
                } else {
                    throw new \Exception('Can not find this config option '.$name);
                }
            } else {
                throw new \Exception('Can not find this config file '.$file);
            }
        }
    }

    public static function all($file)
    {
        /**
         * 1. 判断配置文件是否存在
         * 2. 判断配置是否存在
         * 3. 缓存配置
         */
        if (isset(self ::$conf[$file])) {
            return self ::$conf[$file];
        } else {
            $path = BEAUTY.'/core/config/'.$file.'.php';
            if (is_file($path)) {
                $conf = include $path;
                self ::$conf[$file] = $conf;
                return $conf;
            } else {
                throw new \Exception('Can not find this config file '.$file);
            }
        }
    }
}