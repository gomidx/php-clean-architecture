<?php

namespace Php\CleanArch\App\Indication;

use Php\CleanArch\Domain\Student\Student;

interface SendIndicationEmail
{
    public function sendTo(Student $indicatedStudent): void;
}