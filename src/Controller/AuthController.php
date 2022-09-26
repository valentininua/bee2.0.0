<?php

namespace App\Controller;

use App\Repository\AuthRepository;
use App\Services\AuthService;

/**
 * Class AuthController
 * @author Valentin Badiul S <ur5fes@ya.ru>
 * @package App\Controller
 */
class AuthController extends Controller
{
    /**
     * @var AuthRepository
     */
    public AuthRepository $repository;

    /**
     * @var AuthService
     */
    public AuthService $service;

    public function __construct($_this)
    {
        $_SESSION['auth'] = null;
        parent::__construct($_this);
        $this->repository = new AuthRepository();
        $this->service = new AuthService();
    }

    public function login(): void
    {
        $auth = $this->service->loginAuth();

        if (!isset($auth)) {
            $this->render('main_index.php', [
                'error' => 'login and pass => admin/admin',
            ]);
        } else {
            $_SESSION['auth'] = (array) $auth;
            header('Location: //' . $_SERVER['SERVER_NAME'] . '/post');
        }
    }

    public function logout(): void
    {
        session_destroy();
        header('Location: //' . $_SERVER['SERVER_NAME'] . '/');
    }

}
