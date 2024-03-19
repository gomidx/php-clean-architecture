<?php

namespace Php\CleanArch;

use DateTimeImmutable;

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