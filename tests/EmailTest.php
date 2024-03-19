<?php

namespace Php\CleanArch;

use InvalidArgumentException;
use PHPUnit\Framework\TestCase;

class EmailTest extends TestCase
{
    public function test_shouldnt_have_invalid_email()
    {
        $this->expectException(InvalidArgumentException::class);

        new Email('invalid email');
    }

    public function test_should_be_represented_as_string()
    {
        $email = new Email('test@test.com');

        $this->assertSame('test@test.com', (string) $email);
    }
}