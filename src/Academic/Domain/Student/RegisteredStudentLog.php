<?php

namespace Php\CleanArch\Academic\Domain\Student;

use Php\CleanArch\Shared\Domain\Event\Event;
use Php\CleanArch\Shared\Domain\Event\EventListener;
use Php\CleanArch\Shared\Domain\RegisteredStudent;

class RegisteredStudentLog extends EventListener
{
    /**
     * @param RegisteredStudent $registeredStudents
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