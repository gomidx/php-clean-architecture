<?php

namespace Php\CleanArch\Academic\Domain\Indication;

use DateTimeImmutable;
use Php\CleanArch\Academic\Domain\Student\Student;

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