<?php

namespace App\Diagnostic\Domain\Model\DiagnosticInstance;

use DateTimeImmutable;
use App\Diagnostic\Domain\ValueObject\Shared\AnswerId;
use App\Diagnostic\Domain\ValueObject\Shared\QuestionId;
use App\Diagnostic\Domain\ValueObject\DiagnosticInstance\InstanceId;
use App\Diagnostic\Domain\ValueObject\DiagnosticInstance\InstanceAnswerId;


final class InstanceAnswer
{
    private InstanceAnswerId $id;
    private InstanceId $instanceId;
    private QuestionId $questionId;
    private AnswerId $answerId;
    private DateTimeImmutable $createdAt;
    private DateTimeImmutable $updatedAt;

    /**
     * @param InstanceAnswerId $id
     * @param InstanceId  $instanceId
     * @param QuestionId $questionId
     * @param AnswerId $answerId
     * @param DateTimeImmutable $createdAt
     * @param DateTimeImmutable $updatedAt
     */
    private function __construct(
        InstanceAnswerId $id,
        InstanceId $instanceId,
        QuestionId $questionId,
        AnswerId $answerId,
        DateTimeImmutable $createdAt,
        DateTimeImmutable $updatedAt
    ) {
        $this->id = $id;
        $this->instanceId  = $instanceId;
        $this->questionId = $questionId;
        $this->answerId = $answerId;
        $this->createdAt = $createdAt;
        $this->updatedAt = $updatedAt;
    }

    /**
     * @param InstanceId $instanceId
     * @param QuestionId $questionId
     * @param AnswerId $answerId
     * @param DateTimeImmutable $createdAt
     * @param DateTimeImmutable|null $updatedAt
     * @param InstanceAnswerId|null $id
     * @return self
     */
    public static function create(
        InstanceId  $instanceId,
        QuestionId $questionId,
        AnswerId $answerId,
        DateTimeImmutable $createdAt,
        ?DateTimeImmutable $updatedAt = null,
        ?InstanceAnswerId $id = null,
    ): self {
        return new self(
            $id ?? new InstanceAnswerId(),
            $instanceId,
            $questionId,
            $answerId,
            $createdAt,
            $updatedAt ?? $createdAt
        );
    }

    public function getId(): InstanceAnswerId
    {
        return $this->id;
    }

    public function getInstanceId(): InstanceId
    {
        return $this->instanceId;
    }

    public function getQuestionId(): QuestionId
    {
        return $this->questionId;
    }

    public function getAnswerId(): AnswerId
    {
        return $this->answerId;
    }

    public function getCreatedAt(): DateTimeImmutable
    {
        return $this->createdAt;
    }

    public function getUpdatedAt(): DateTimeImmutable
    {
        return $this->updatedAt;
    }

    public function setUpdatedAt(DateTimeImmutable $updatedAt): self
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }
}
