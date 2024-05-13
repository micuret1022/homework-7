<?php

namespace app\core;

use Twig\Environment;
use Twig\Loader\FilesystemLoader;

class Controller
{
    function __construct()
    {
        $loader = new \Twig\Loader\FilesystemLoader(__DIR__);
        $loader->addPath('../public/assets/views', $namespace = '__main__');
        $this->twig = new \Twig\Environment($loader);
    }

}