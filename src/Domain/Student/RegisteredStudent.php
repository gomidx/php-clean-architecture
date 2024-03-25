<?php

namespace Php\CleanArch\Domain\Student;

use DateTimeImmutable;
use Php\CleanArch\Domain\Cpf;
use Php\CleanArch\Domain\Event;

class RegisteredStudent implements Event
{
    private DateTimeImmutable $moment;

    public function __construct(
        private Cpf $cpf
    ) {
        $this->moment = new DateTimeImmutable();
    }

    public function getCpf(): Cpf
    {
        return $this->cpf;
    }

    public function moment(): DateTimeImmutable
    {
        return $this->moment;
    }
}