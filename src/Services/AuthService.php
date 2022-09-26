<?php

namespace App\Services;

use App\Dto\AuthDto;
use App\Repository\AuthRepository;

/**
 * @author Valentin Badiul S <ur5fes@ya.ru>
 * Class AuthService
 * @package App\Services
 */
class AuthService
{
    public AuthRepository $repository;

    public function __construct()
    {
        $this->repository = new AuthRepository();
    }

    public function checkFirstName($_post = ''): bool
    {
        if (!isset($_post['FirstName'])) {
            return false;
        }

        if (preg_match("/^([A-Za-z0-9_\-\.]){2,40}$/", $_post['FirstName'])) {

            return true;
        } else {

            return false;
        }
    }

    /**
     * @return AuthDto|null
     */
    public function loginAuth(): ?AuthDto
    {
        if ($this->checkFirstName($_POST)) {

            return $this->repository->getAuth(array(
                'FirstName' => $_POST['FirstName'],
                'accountPassword' => $_POST['accountPassword'],
            ));
        } else {
            return null;
        }
    }

}
