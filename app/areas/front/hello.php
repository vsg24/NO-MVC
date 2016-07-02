<?php

$view = \NOMVC\Core\View::toView(getAppServices()['view']);
return $view->render('front/hello.html.twig');