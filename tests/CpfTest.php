<?php

namespace Php\CleanArch;

use InvalidArgumentException;
use PHPUnit\Framework\TestCase;

class CpfTest extends TestCase
{
    public function test_shouldnt_have_invalid_cpf()
    {
        $this->expectException(InvalidArgumentException::class);

        new Cpf('12345678999');
    }

    public function test_should_be_represented_as_string()
    {
        $cpf = new Cpf('123.456.789-99');

        $this->assertSame('123.456.789-99', (string) $cpf);
    }
}