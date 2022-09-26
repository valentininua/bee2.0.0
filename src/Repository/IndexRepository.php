<?php

namespace App\Repository;

use App\Db\Database;
use PDO;

/**
 * @author Valentin Badiul S <ur5fes@ya.ru>
 * Class ServiceReportRepository
 * @package App\Repository
 */
class IndexRepository
{
    private PDO $db;

    public function __construct()
    {
        $this->db = Database::getInstance();
        Database::setCharsetEncoding();
    }

    /**
     * @return array
     */
    public function getPost(): array
    {
        $sqlExample = 'SELECT * FROM posts';
        $stm = $this->db->query($sqlExample);

        return $stm->fetchAll(PDO::FETCH_ASSOC);
    }

}
