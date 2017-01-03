<?php

if (!defined('APPLICATION_ROOT')) {
    define('APPLICATION_ROOT', getcwd());
}

spl_autoload_register('autoLoader');
function autoLoader($class_name)
{
    $class = str_replace('\\', DIRECTORY_SEPARATOR, $class_name) . '.php';
    $fileClass = APPLICATION_ROOT . DIRECTORY_SEPARATOR . 'src' . DIRECTORY_SEPARATOR . $class;

    if (file_exists($fileClass)) {
        require_once $fileClass;
    }
}
