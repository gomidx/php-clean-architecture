<?php

namespace Php\CleanArch\Shared\Domain;

use DateTimeImmutable;
use Php\CleanArch\Shared\Domain\Event\Event;
use Php\CleanArch\Shared\Domain\Cpf;

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

    public function jsonSerialize(): mixed
    {
        return get_object_vars($this);
    }
}