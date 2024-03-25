<?php

namespace Php\CleanArch\Domain;

use DateTimeImmutable;

interface Event
{
    public function moment(): DateTimeImmutable;
}