<?php

namespace App\Diagnostic\Infrastructure\Persistence\Doctrine;

use Doctrine\ORM\EntityManagerInterface;
use App\Diagnostic\Domain\Model\Diagnostic\Answer;
use App\Diagnostic\Domain\Model\Diagnostic\Question;
use App\Diagnostic\Domain\Model\Diagnostic\Diagnostic;
use App\Diagnostic\Domain\ValueObject\Shared\AnswerId;
use App\Diagnostic\Domain\ValueObject\Shared\QuestionId;
use App\Diagnostic\Domain\Model\Diagnostic\DiagnosticKey;
use App\Diagnostic\Infrastructure\Maper\DiagnosticMapper;
use App\Diagnostic\Domain\ValueObject\Shared\DiagnosticId;
use App\Diagnostic\Domain\ValueObject\Shared\DiagnosticKeyId;
use App\Diagnostic\Domain\Model\Diagnostic\DiagnosticKeyLevel;
use App\Diagnostic\Domain\Repository\DiagnosticRepositoryInterface;
use App\Diagnostic\Domain\ValueObject\Diagnostic\DiagnosticKeyLevelId;


final class DiagnosticRepositoryDoctrine implements DiagnosticRepositoryInterface
{
    public function __construct(private EntityManagerInterface $em)
    {
        //
    }

    public function save(Diagnostic $diagnostic): void
    {
        $entity = DiagnosticMapper::toEntity($diagnostic);

        $this->em->persist($entity);

        $this->em->flush();
    }

    public function find(DiagnosticId $id): ?Diagnostic
    {
        $entity = $this->em->getRepository(DiagnosticEntity::class)->find($id);

        return $entity ? DiagnosticMapper::toDomain($entity) : null;
    }

    public function saveQuestion(Question $question): void
    {
        //
    }

    public function findQuestion(QuestionId $id): ?Question
    {
        return null;
    }

    public function saveAnswer(Answer $answer): void
    {
        //
    }

    public function findAnswer(AnswerId $id): ?Answer
    {
        return null;
    }

    public function saveKey(DiagnosticKey $key): void
    {
        //
    }

    public function findKey(DiagnosticKeyId $id): ?DiagnosticKey
    {
        return null;
    }

    public function saveKeyLavel(DiagnosticKeyLevel $level): void
    {
        //
    }

    public function findKeyLevel(DiagnosticKeyLevelId $id): ?DiagnosticKeyLevel
    {
        return null;
    }
}
