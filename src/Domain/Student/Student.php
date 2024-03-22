<?php

namespace Php\CleanArch\Domain\Student;

use Php\CleanArch\Domain\Cpf;
use Php\CleanArch\Domain\Email;

class Student
{
    private array $phoneNumbers;
    private string $password;

    public static function withCpfAndNameAndEmail(string $cpf, string $name, string $email): self
    {
        return new Student(new Cpf($cpf), $name, new Email($email));
    }

    public function __construct(
        private Cpf $cpf,
        private string $name,
        private Email $email
    ) {}

    public function addPhoneNumber(string $prefix, string $number): self
    {
        $this->phoneNumbers[] = new PhoneNumber($prefix, $number);

        return $this;
    }

    public function getCpf(): string
    {
        return $this->cpf;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function getPhoneNumbers(): array
    {
        return $this->phoneNumbers;
    }
}