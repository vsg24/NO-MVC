<?php

$view = \NOMVC\Core\View::toView(getAppServices()['view']);
$db = \NOMVC\Core\SQLDatabase::toSQLDatabase(getAppServices()['database'])->dbConn;

return $view->render('front/index.html.twig',
    ['generatedIn' => NOMVC_STOP - NOMVC_START,'phpVersion' => phpversion()]);