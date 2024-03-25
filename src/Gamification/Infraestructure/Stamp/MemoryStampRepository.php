<?php

namespace Php\CleanArch\Gamification\Infraestructure\Stamp;

use Php\CleanArch\Gamification\Domain\Stamp\Stamp;
use Php\CleanArch\Gamification\Domain\Stamp\StampRepository;
use Php\CleanArch\Shared\Domain\Cpf;

class MemoryStampRepository implements StampRepository
{
    private array $stamps = [];

    public function add(Stamp $stamp): void
    {
        $this->stamps[] = $stamp;
    }

    public function studentStamps(Cpf $cpf)
    {
        return array_filter(
            $this->stamps,
            fn (Stamp $stamp) => $stamp->getCpf() == $cpf
        );
    }
}