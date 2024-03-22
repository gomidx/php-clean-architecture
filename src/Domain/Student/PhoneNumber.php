<?php

namespace Php\CleanArch\Domain\Student;

use InvalidArgumentException;
use Stringable;

class PhoneNumber implements Stringable
{
    private string $prefix;
    private string $number;

    public function __construct(string $prefix, string $number)
    {
        $this->setPrefix($prefix);
        $this->setNumber($number);
    }

    private function setPrefix(string $prefix): void
    {
        $this->validatePrefix($prefix);

        $this->prefix = $prefix;
    }

    private function validatePrefix(string $prefix): void
    {
        if (preg_match('/\d{2}/', $prefix) !== 1) {
            throw new InvalidArgumentException(
                'Prefix must be valid.'
            );
        }
    }

    private function setNumber(string $number): void
    {
        $this->validateNumber($number);

        $this->number = $number;
    }

    private function validateNumber(string $number): void
    {
        if (preg_match('/\d{8,9}/', $number) !== 1) {
            throw new InvalidArgumentException(
                'Phone number must be valid.'
            );
        }
    }

    public function getPrefix(): string
    {
        return $this->prefix;
    }

    public function getNumber(): string
    {
        return $this->number;
    }


    public function __toString(): string
    {
        return "({$this->prefix}) {$this->number}";
    }
}