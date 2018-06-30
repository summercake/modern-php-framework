<?php

namespace core;

class beauty
{
    public static $classMap = array();
    public $assign;

    public static function run()
    {
        // 日志启动与写入
        //\core\lib\log ::init();
        //\core\lib\log ::log($_SERVER, 'server');
        $route = new \core\lib\route();
        //p($route);
        $controller = $route -> controller;
        $action = $route -> action;
        $controllerFile = APP.'/controller/'.$controller.'Controller.php';
        $controllerClass = '\\'.MODULE.'\controller\\'.$controller.'Controller';
        //p($controllerClass);
        if (is_file($controllerFile)) {
            include $controllerFile;
            $controller = new $controllerClass;
            $controller -> $action();
            //\core\lib\log ::log('controller: '.$controllerClass.PHP_EOL.'action: '.$action);
        } else {
            throw new \Exception('Can not find controller'.$controllerClass);
        }
    }

    public static function load($class)
    {
        // auto-loads libs
        //p($class);
        //p(BEAUTY.$class.'.php');
        if (isset($classMap[$class])) {
            return true;
        } else {
            $class = str_replace('\\', '/', $class);
            $file = BEAUTY.'/'.$class.'.php';
            if (is_file($file)) {
                include $file;
                self ::$classMap[$class] = $class;
            } else {
                return false;
            }
        }
    }

    public function assign($name, $value)
    {
        $this -> assign[$name] = $value;
    }

    public function display($file)
    {
        $file = APP.'/views/'.$file;
        if (is_file($file)) {
            \Twig_Autoloader ::register();
            $loader = new \Twig_Loader_Filesystem(APP.'/views');
            $twig = new \Twig_Environment($loader, array(
                'cache' => BEAUTY.'/log',
                'debug' => DEBUG,
            ));
            $template = $twig -> loadTemplate('index.html');
            $template -> display($this -> assign ? $this -> assign : '');
        }
    }
}