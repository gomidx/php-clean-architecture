<?php

namespace Php\CleanArch\Academic\App\Student\Dtos;

class RegisterStudentDto
{
    public function __construct(
        public string $studentCpf,
        public string $studentName,
        public string $studentEmail
    ) {}
}