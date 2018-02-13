<?php declare(strict_types=1);

use Symfony\Component\VarDumper\VarDumper;

if (!function_exists('dd')) {
    function dd($var)
    {
        foreach (func_get_args() as $var) {
            VarDumper::dump($var);
        }
        die();
    }
}

if (!function_exists('d')) {
    function d($var)
    {
        foreach (func_get_args() as $var) {
            VarDumper::dump($var);
        }
    }
}
