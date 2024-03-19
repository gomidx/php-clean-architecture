<?php

namespace Php\CleanArch;

class Student
{
    private array $phoneNumbers;

    public static function withCpfAndNameAndEmail(string $cpf, string $name, string $email): self
    {
        return new Student(new Cpf($cpf), $name, new Email($email));
    }

    public function __construct(
        private Cpf $cpf,
        private string $name,
        private Email $email
    ) {}

    public function addPhoneNumber(string $prefix, string $number)
    {
        $this->phoneNumbers[] = new PhoneNumber($prefix, $number);

        return $this;
    }
}
