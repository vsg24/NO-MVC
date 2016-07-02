<?php

$router = new AltoRouter();
// uncomment and set if your app lives in a subdirectory (not document root)
//$router->setBasePath('/alto-app/');



// Define your desired routes here! In the form of closure or lambdas

$router->map('GET', '/', function() {
    require_once getAppRoot(true) . 'areas/front/index.php';
});