<?php

namespace Php\CleanArch\Academic\Domain\Student;

use Php\CleanArch\Shared\Domain\Cpf;

interface StudentRepository
{
    public function store(Student $student): void;
    public function getByCpf(Cpf $cpf): Student;
    public function getAll(): array;
}