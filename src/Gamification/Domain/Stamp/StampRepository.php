<?php

namespace Php\CleanArch\Gamification\Domain\Stamp;

use Php\CleanArch\Shared\Domain\Cpf;

interface StampRepository
{
    public function add(Stamp $stamp): void;
    public function studentStamps(Cpf $cpf);
}