<?php
date_default_timezone_set('Europe/Helsinki');

if (!defined('DS'))
{
    define ('DS', DIRECTORY_SEPARATOR);
}

function autoloadClass($className)
{

    $pathToFile = __DIR__ . DS . str_replace('_', DS, $className) . '.php';
    if (!file_exists($pathToFile))
    {
        die ("Unable to find class '$className' from '$pathToFile'");
    }
    include $pathToFile;
}

spl_autoload_register("autoloadClass");