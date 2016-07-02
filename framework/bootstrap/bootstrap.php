<?php

/*
|--------------------------------------------------------------------------
| Register The Composer Auto Loader
|--------------------------------------------------------------------------
|
| Composer provides a convenient, automatically generated class loader
| for our application. We just need to utilize it! We'll require it
| into the script here so that we do not have to worry about the
| loading of any our classes "manually". Feels great to relax.
|
*/

require_once __DIR__ . '/../../vendor/autoload.php';
require_once  __DIR__ . '/../registerFunctions.php';
require_once __DIR__ . '/../../config/config.php';

/**
 * Returns an associative array containing app service objects
 *
 * @return array
 */
function getAppServices()
{
    // Instantiate the View engine core
    $view = new NOMVC\Core\View();
    // Instantiate the Database engine core
    $database = new NOMVC\Core\Database();

    return ['view' => $view, 'database' => $database];
}