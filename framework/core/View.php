<?php

namespace NOMVC\Core;

class View
{
    public $twig;

    public function __construct()
    {
        $approot = getAppRoot(true);
        $loader = new \Twig_Loader_Filesystem([
            $approot,
            $approot . 'areas' // Recommended naming convention
        ]);
        
        $this->twig = new \Twig_Environment($loader, [
            'cache' => (TWIG_CACHE === true ? getProjectRoot(true) . 'cache/views' : false),
            'debug' => TWIG_DEBUG
        ]);
    }

    public function render($pathToTemplate, $additionalData = [])
    {
        if($pathToTemplate == null)
        {
            return new \Exception("Template path is not set");
        }

        echo $this->twig->render($pathToTemplate, $additionalData);
    }

    public static function toView($view) : View
    {
        return $view;
    }
}