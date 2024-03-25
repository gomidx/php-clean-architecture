<?php

namespace Php\CleanArch\Gamification\App;

use Php\CleanArch\Gamification\App\Dtos\GetUserStampsDto;
use Php\CleanArch\Gamification\Domain\Stamp\StampRepository;
use Php\CleanArch\Shared\Domain\Cpf;

class GetUserStamps
{
    public function __construct(
        private StampRepository $repository
    ) {}

    public function exec(GetUserStampsDto $dto)
    {
        return $this->repository->studentStamps(new Cpf($dto->cpf));
    }
}