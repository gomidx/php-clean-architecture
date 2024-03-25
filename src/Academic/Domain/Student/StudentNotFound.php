<?php

namespace Php\CleanArch\Academic\Domain\Student;

use DomainException;
use Php\CleanArch\Shared\Domain\Cpf;

class StudentNotFound extends DomainException
{
    public function __construct(Cpf $cpf)
    {
        parent::__construct("Student with CPF $cpf not found.");
    }
}