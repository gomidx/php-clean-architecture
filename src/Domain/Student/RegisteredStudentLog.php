<?php

namespace Php\CleanArch\Domain\Student;

use Php\CleanArch\Domain\Event;
use Php\CleanArch\Domain\EventListener;

class RegisteredStudentLog extends EventListener
{
    /**
     * @param RegisteredStudent $registeredStudent
     */
    public function reactsTo(Event $registeredStudent): void
    {
        fprintf(
            STDERR,
            'Student with CPF %s was registered on date %s',
            (string) $registeredStudent->getCpf(),
            $registeredStudent->moment()->format('d/m/Y')
        );
    }

    public function willProcess(Event $event): bool
    {
        return $event instanceof RegisteredStudent;
    }
}