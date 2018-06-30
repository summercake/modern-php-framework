<?php
/**
 * 通用函数库
 * @param $var
 */
function p($var)
{
    if (is_bool($var)) {
        var_dump($var);
    } else {
        if (is_null($var)) {
            var_dump(null);
        } else {
            echo "<pre>".print_r($var, true)."</pre>";
        }
    }
}