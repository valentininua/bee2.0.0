<?php

namespace App\Component;

/**
 * Class IndexController
 * @author Valentin Badiul S <ur5fes@ya.ru>
 * @package App\Controller
 */
class Routing
{

    public $uri = null;
    public $routing = null;

    public function __construct($routing)
    {
        $this->routing = $routing;

        if (!$routing[$_SERVER["REQUEST_URI"]]) {
            $this->e404();
        } else {
            $this->uri = explode('::', $routing[$_SERVER["REQUEST_URI"]]);
        }
    }

    public function getFunctionClass($_this)
    {
        $AppController = '\App\Controller\\';
        $controllerClass = $AppController . $this->uri[0];
        $funcName = $this->uri[1];
        $newController = new $controllerClass($_this);

        return $newController->{$funcName}();
    }

    public function e404(): void
    {
        header("HTTP/1.0 404 Not Found");
        echo ' <h1>Error 404 not found  </h1><br />';
        echo "The HTTP error 404 !!! ";
        exit(''); // todo will return
    }
}
