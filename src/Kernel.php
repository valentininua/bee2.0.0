<?php

namespace App;

use App\Component\Routing;
use App\Db\Database;
use PDO;

/**
 * @author Valentin Badiul S <ur5fes@ya.ru>
 * Class Kernel
 * @package App
 */
class Kernel
{
    public ?PDO $db = null;
    public array $routing = [];
    public ?Routing $newRouting = null;

    public function __construct($routing = [])
    {
        $this->routing = $routing;
        $this->db = Database::getInstance();
        Database::setCharsetEncoding();
        $this->newRouting = new Routing($this->routing);
    }

    public function run()
    {
        return $this->newRouting->getFunctionClass($this);
    }
}
