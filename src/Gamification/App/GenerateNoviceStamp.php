<?php

namespace Php\CleanArch\Gamification\App;

use Php\CleanArch\Gamification\Domain\Stamp\Stamp;
use Php\CleanArch\Gamification\Domain\Stamp\StampRepository;
use Php\CleanArch\Shared\Domain\Event\Event;
use Php\CleanArch\Shared\Domain\Event\EventListener;
use Php\CleanArch\Shared\Domain\RegisteredStudent;

class GenerateNoviceStamp extends EventListener
{
    public function __construct(
        private StampRepository $repository
    ) {}

    public function willProcess(Event $event): bool
    {
        return $event instanceof RegisteredStudent;
    }

    public function reactsTo(Event $event): void
    {
        $cpf = $event->jsonSerialize()['getCpf'];

        $stamp = new Stamp($cpf, 'Novice');

        $this->repository->add($stamp);
    }
}