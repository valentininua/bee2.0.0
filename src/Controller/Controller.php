<?php

namespace App\Controller;
/**
 * Class Controller
 * @author Valentin Badiul S <ur5fes@ya.ru>
 * @package App\Controller
 */
class Controller
{
    public $kernel = null;

    public function __construct($_this)
    {
        session_start();
        $this->kernel = $_this;
    }

    public function render($template, array $arr = []): void
    {
        $urlTemplate = __DIR__ . '/../Template/';
        include $urlTemplate . "_header.php";
        include $urlTemplate . $template;
        include $urlTemplate . "_footer.php";
    }

    public function renderJson($arr = []): void
    {
        header("Content-type:application/json; charset=utf-8");
        echo json_encode($arr);
        exit;
    }
}
