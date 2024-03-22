<?php

namespace Php\CleanArch\Domain\Infraestructure\Student;

interface PasswordEncrypter
{
    public function encrypt(string $password): string;
    public function match(string $password, string $encryptedPassword): bool;
}