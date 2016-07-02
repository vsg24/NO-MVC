<?php

global $view;
return $view->render('front/index.html.twig', ['generated' => NOMVC_STOP - NOMVC_START]);