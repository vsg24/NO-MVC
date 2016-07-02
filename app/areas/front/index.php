<?php

$view = \NOMVC\Core\View::toView(getAppServices()['view']);
$db = \NOMVC\Core\Database::toDatabase(getAppServices()['database'])->db;

return $view->render('front/index.html.twig', ['generated' => NOMVC_STOP - NOMVC_START]);