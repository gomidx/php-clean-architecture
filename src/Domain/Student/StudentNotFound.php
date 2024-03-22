<?php

namespace Php\CleanArch\Domain\Student;

use DomainException;
use Php\CleanArch\Domain\Cpf;

class StudentNotFound extends DomainException
{
    public function __construct(Cpf $cpf)
    {
        parent::__construct("Student with CPF $cpf not found.");
    }
}