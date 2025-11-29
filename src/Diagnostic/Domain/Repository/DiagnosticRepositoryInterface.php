<?php

namespace App\Diagnostic\Domain\Repository;

use App\Diagnostic\Domain\Model\Diagnostic\Answer;
use App\Diagnostic\Domain\Model\Diagnostic\Question;
use App\Diagnostic\Domain\Model\Diagnostic\Diagnostic;
use App\Diagnostic\Domain\ValueObject\Shared\AnswerId;
use App\Diagnostic\Domain\ValueObject\Shared\QuestionId;
use App\Diagnostic\Domain\Model\Diagnostic\DiagnosticKey;
use App\Diagnostic\Domain\ValueObject\Shared\DiagnosticId;
use App\Diagnostic\Domain\ValueObject\Shared\DiagnosticKeyId;
use App\Diagnostic\Domain\Model\Diagnostic\DiagnosticKeyLevel;
use App\Diagnostic\Domain\ValueObject\Diagnostic\DiagnosticKeyLevelId;


interface DiagnosticRepositoryInterface
{
    public function save(Diagnostic $diagnostic): void;
    public function find(DiagnosticId $id): ?Diagnostic;

    public function saveQuestion(Question $question): void;
    public function findQuestion(QuestionId $id): ?Question;

    public function saveAnswer(Answer $answer): void;
    public function findAnswer(AnswerId $id): ?Answer;

    public function saveKey(DiagnosticKey $key): void;
    public function findKey(DiagnosticKeyId $id): ?DiagnosticKey;

    public function saveKeyLavel(DiagnosticKeyLevel $level): void;
    public function findKeyLevel(DiagnosticKeyLevelId $id): ?DiagnosticKeyLevel;
}
