<?php

namespace Php\CleanArch\Domain;

use InvalidArgumentException;
use Stringable;

class Email implements Stringable
{
    private string $address;

    public function __construct(string $address)
    {
        $this->setEmail($address);
    }

    private function setEmail(string $address): void
    {
        $this->validate($address);

        $this->address = $address;
    }

    private function validate(string $address): void
    {
        if (filter_var($address, FILTER_VALIDATE_EMAIL) === false) {
            throw new InvalidArgumentException(
                'E-mail must be valid.'
            );
        }
    }

    public function __toString(): string
    {
        return $this->address;
    }
}