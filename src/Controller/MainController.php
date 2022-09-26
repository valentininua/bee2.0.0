<?php

namespace App\Controller;

use App\Repository\IndexRepository;
use JsonException;

/**
 * Class IndexController
 * @author Valentin Badiul S <ur5fes@ya.ru>
 * @package App\Controller
 */
class MainController extends Controller
{

    public IndexRepository $repository;

    public function __construct($_this)
    {
        parent::__construct($_this);
        $this->repository = new IndexRepository();
    }

    public function main(): void
    {
        try {
            $this->render('main_main.php', []);
        } catch (JsonException $e) {
            var_dump($e);
            exit('Error:: 500');
        }
    }

    public function post(): void
    {
        if (!$this->checkSession()) {
            $this->renderJson(['session' => 'exit']);
        }

        try {
            $this->render('main_post.php', ['data' => $this->repository->getPost()]);
        } catch (JsonException $e) {
            var_dump($e);
            exit('Error:: 500');
        }
    }

    /**
     * @return bool
     */
    private function checkSession(): bool
    {
        if(count($_SESSION)) {
            return (bool) @$_SESSION["auth"]['login'];
        }
        return false;
    }
}
