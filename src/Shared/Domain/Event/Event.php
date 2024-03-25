<?php

namespace Php\CleanArch\Shared\Domain\Event;

use DateTimeImmutable;
use JsonSerializable;
use Php\CleanArch\Shared\Domain\Cpf;

interface Event extends JsonSerializable
{
    public function moment(): DateTimeImmutable;
    public function getCpf(): Cpf;
}