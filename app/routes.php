<?php

$router = new AltoRouter();
// uncomment and set if your app lives in a subdirectory (not document root)
//$router->setBasePath('/alto-app/');


// Define your desired routes here! In the form of closure or lambdas
// You may also define some helper variables/constants here

$router->map('GET', '/', function() {
    require_once getAppRoot(true) . AREAS_DIR['front'] . '/index.php';
});

$router->map('GET', '/hello', function() {
    require_once getAppRoot(true) . AREAS_DIR['front'] . '/hello.php';
});