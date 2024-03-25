<?php

namespace Php\CleanArch\Gamification\App\Dtos;

class GetUserStampsDto
{
    public function __construct(
        public string $cpf
    ) {}
}