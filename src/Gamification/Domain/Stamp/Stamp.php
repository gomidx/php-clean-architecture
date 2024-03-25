<?php

namespace Php\CleanArch\Gamification\Domain\Stamp;

use Php\CleanArch\Shared\Domain\Cpf;
use Stringable;

class Stamp implements Stringable
{
    public function __construct(
        private Cpf $cpf,
        private string $name
    ) {}

    public function getCpf(): Cpf
    {
        return $this->cpf;
    }

    public function __toString(): string
    {
        return $this->name;
    }
}