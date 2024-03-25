<?php

namespace Php\CleanArch\Academic\Infraestructure\Student;

use PDO;
use Php\CleanArch\Academic\Domain\Student\Student;
use Php\CleanArch\Academic\Domain\Student\StudentNotFound;
use Php\CleanArch\Academic\Domain\Student\StudentRepository;
use Php\CleanArch\Shared\Domain\Cpf;

class PdoStudentRepository implements StudentRepository
{
    public function __construct(
        private PDO $connection
    ) {}

    public function store(Student $student): void
    {
        $stmt = $this->connection->prepare(
            'INSERT INTO alunos VALUES (:cpf, :nome, :email)'
        );

        $stmt->bindValue('cpf', $student->getCpf());
        $stmt->bindValue('nome', $student->getName());
        $stmt->bindValue('email', $student->getEmail());

        foreach ($student->getPhoneNumbers() as $phoneNumber) {
            $stmt = $this->connection->prepare(
                'INSERT INTO telefones VALUES (:ddd, :numero, :cpf_aluno)'
            );

            $stmt->bindValue('ddd', $phoneNumber->getPrefix());
            $stmt->bindValue('numero', $phoneNumber->getNumber());
            $stmt->bindValue('cpf_aluno', $student->getCpf());
        }
    }

    public function getByCpf(Cpf $cpf): Student
    {
        $stmt = $this->connection->prepare('
            SELECT
              cpf,
              nome,
              email
              ddd,
              numero AS numero_telefone
            FROM
              alunos
            LEFT JOIN
              telefones
              ON telefones.cpf_aluno = alunos.cpf
            WHERE
              alunos.cpf = ?;
        ');

        $stmt->bindValue(1, (string) $cpf);
        $stmt->execute();

        $studentData = $stmt->fetchAll(PDO::FETCH_ASSOC);

        if (count($studentData) === 0) {
            throw new StudentNotFound($cpf);
        }

        return $this->mapStudent($studentData);
    }

    private function mapStudent(array $studentData): Student
    {
        $first = $studentData[0];

        $student = Student::withCpfAndNameAndEmail(
            $first['cpf'],
            $first['nome'],
            $first['email']
        );

        $phoneNumbers = array_filter(
            $studentData,
            fn ($phoneNumber) => $phoneNumber['ddd'] !== null && $phoneNumber['numero_telefone'] !== null
        );

        foreach ($phoneNumbers as $phoneNumber) {
            $student->addPhoneNumber($phoneNumber['ddd'], $phoneNumber['numero_telefone']);
        }

        return $student;
    }

    public function getAll(): array
    {
        $stmt = $this->connection->query('
            SELECT
              cpf,
              nome,
              email
              ddd,
              numero AS numero_telefone
            FROM
              alunos
            LEFT JOIN
              telefones
              ON telefones.cpf_aluno = alunos.cpf
        ');

        $studentDataList = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $students = [];

        foreach ($studentDataList as $studentData) {
            if (!array_key_exists($studentData['cpf'], $students)) {
                $students[$studentData['cpf']] = Student::withCpfAndNameAndEmail(
                    $studentData['cpf'],
                    $studentData['nome'],
                    $studentData['email'],
                );
            }

            $students[$studentData['cpf']]->addPhoneNumber($studentData['ddd'], $studentData['numero_telefone']);
        }

        return $students;
    }
}