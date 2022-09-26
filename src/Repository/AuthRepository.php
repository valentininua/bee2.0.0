<?php

namespace App\Repository;

use App\Db\Database;
use App\Dto\AuthDto;
use PDO;


class AuthRepository
{

    private PDO $db;

    public function __construct()
    {
        $this->db = Database::getInstance();
        // Database::setCharsetEncoding();
    }

    /**
     * @param array $arr
     * @return AuthDto
     */
    public function getAuth(array $arr = []): ?AuthDto
    {
        $userSql = '
            SELECT
               id,  
               login,
               pass
            FROM users
            WHERE login = "'
            . trim($arr['FirstName']) . '"';

        $stm = $this->db->query($userSql);
        $userArray = $stm->fetch(PDO::FETCH_ASSOC);

        return $userArray ? (new AuthDto())->setLogin($userArray['login']) : null;
    }


}
