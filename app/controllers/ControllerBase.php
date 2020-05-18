<?php
declare(strict_types=1);

namespace App\Controllers;

use Phalcon\Mvc\Controller;

class ControllerBase extends Controller
{
    // Implement common logic
    public function onConstruct()
    {
        $this->assets->addCss('/css/main.css');
        // $this->assets->addCss('/css/util.css');
        $this->assets->addCss('/css/home.css');
        $this->assets->addCss('/css/slider.css');
        $this->assets->addCss('/css/lightbox.css');
        $this->assets->addJs('/js/jquery.lightbox.js');
    }
}
