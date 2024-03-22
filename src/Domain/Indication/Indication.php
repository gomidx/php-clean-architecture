<?php

namespace Php\CleanArch\Domain\Indication;

use DateTimeImmutable;
use Php\CleanArch\Domain\Student\Student;

class Indication
{
    private DateTimeImmutable $date;

    public function __construct(
        private Student $indicator,
        private Student $indicated
    ) {
        $this->date = new DateTimeImmutable();
    }
}