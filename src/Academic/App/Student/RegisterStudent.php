<?php

namespace Php\CleanArch\Academic\App\Student;

use Php\CleanArch\Academic\App\Student\Dtos\RegisterStudentDto;
use Php\CleanArch\Domain\EventPublisher;
use Php\CleanArch\Domain\Student\RegisteredStudent;
use Php\CleanArch\Domain\Student\Student;
use Php\CleanArch\Domain\Student\StudentRepository;

class RegisterStudent
{
    public function __construct(
        private StudentRepository $repository,
        private EventPublisher $publisher
    ) {}

    public function exec(RegisterStudentDto $data)
    {
        $student = Student::withCpfAndNameAndEmail($data->studentCpf, $data->studentName, $data->studentEmail);

        $this->repository->store($student);

        $this->publisher->publish(new RegisteredStudent($student->getCpf()));
    }
}