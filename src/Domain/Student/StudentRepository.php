<?php

namespace Php\CleanArch\Domain\Student;

use Php\CleanArch\Domain\Cpf;

interface StudentRepository
{
    public function store(Student $student): void;
    public function getByCpf(Cpf $cpf): Student;
    public function getAll(): array;
}