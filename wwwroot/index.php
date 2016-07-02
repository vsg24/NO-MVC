<?php
define('NOMVC_START', microtime(true));

require_once __DIR__ . '/../framework/bootstrap/bootstrap.php';
require_once __DIR__ . '/../app/routes.php';

define('NOMVC_STOP', microtime(true));

// Do whatever is specified in that file with route info
require_once __DIR__ . '/../framework/bootstrap/handleRoute.php';