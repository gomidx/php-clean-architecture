<?php

namespace Php\CleanArch\App\Student;

use Php\CleanArch\App\Student\Dtos\RegisterStudentDto;
use Php\CleanArch\Domain\Student\Student;
use Php\CleanArch\Domain\Student\StudentRepository;

class RegisterStudent
{
    public function __construct(
        private StudentRepository $repository
    ) {}

    public function exec(RegisterStudentDto $data)
    {
        $student = Student::withCpfAndNameAndEmail($data->studentCpf, $data->studentName, $data->studentEmail);

        $this->repository->store($student);
    }
}