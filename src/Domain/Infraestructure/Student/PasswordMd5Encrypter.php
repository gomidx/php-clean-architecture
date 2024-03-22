<?php

namespace Php\CleanArch\Domain\Infraestructure\Student;

class PasswordMd5Encrypter implements PasswordEncrypter
{
    public function encrypt(string $password): string
    {
        return md5($password);
    }

    public function match(string $password, string $encryptedPassword): bool
    {
        return md5($password) === $encryptedPassword;
    }
}