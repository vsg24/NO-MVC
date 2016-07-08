<?php

$router = new AltoRouter();
// uncomment and set if your app lives in a subdirectory (not document root)
//$router->setBasePath('/alto-app/');


// Define your desired routes here! In the form of closure or lambdas
// You may also define some helper variables/constants here

/*
 * Available rout filters

*                    // Match all request URIs
[i]                  // Match an integer
[i:id]               // Match an integer as 'id'
[a:action]           // Match alphanumeric characters as 'action'
[h:key]              // Match hexadecimal characters as 'key'
[:action]            // Match anything up to the next / or end of the URI as 'action'
[create|edit:action] // Match either 'create' or 'edit' as 'action'
[*]                  // Catch all (lazy, stops at the next trailing slash)
[*:trailing]         // Catch all as 'trailing' (lazy)
[**:trailing]        // Catch all (possessive - will match the rest of the URI)
.[:format]?          // Match an optional parameter 'format' - a / or . before the block is also optional

 */

$router->map('GET|POST', '/', function() {
    require_once getAppRoot(true) . AREAS_DIR['front'] . '/index.php';
});

$router->map('GET', '/hello', function() {
    require_once getAppRoot(true) . AREAS_DIR['front'] . '/hello.php';
});

$router->map('GET', '/hello/[a:name]/[i:age]', function($name, $age) {
    echo 'Hello ' . $name . ', ' .  $age . ' yo';
});