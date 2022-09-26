<?php

namespace App\Dto;

/**
 * @author Valentin Badiul S <ur5fes@ya.ru>
 *
 * Class AuthDto
 * @package App\Dto
 */
class AuthDto
{
    public ?string $login = null;

    public function getLogin(): ?string
    {
        return $this->login;
    }

    public function setLogin(?string $login): self
    {
        $this->login = $login;

        return $this;
    }


}
