<?php

namespace App\Diagnostic\Domain\Model\DiagnosticInstance;

use DateTimeImmutable;
use App\Diagnostic\Domain\ValueObject\Shared\UserId;
use App\Diagnostic\Domain\ValueObject\Shared\DiagnosticId;
use App\Diagnostic\Domain\ValueObject\DiagnosticInstance\InstanceId;



final class Instance
{
    private InstanceId $id;
    private DiagnosticId $diagnosticId;
    private UserId $userId;
    private bool $is_finished;
    private DateTimeImmutable $startedAt;
    private ?DateTimeImmutable $finishedAt;

    /**
     * @param InstanceId $id
     * @param DiagnosticId $diagnosticId
     * @param UserId $userId
     * @param bool $is_finished
     * @param DateTimeImmutable $startedAt
     * @param DateTimeImmutable|null $finishedAt
     */
    private function __construct(
        InstanceId $id,
        DiagnosticId $diagnosticId,
        UserId $userId,
        bool $is_finished,
        DateTimeImmutable $startedAt,
        ?DateTimeImmutable $finishedAt,

    ) {
        $this->id = $id;
        $this->diagnosticId = $diagnosticId;
        $this->userId = $userId;
        $this->is_finished = $is_finished;
        $this->startedAt = $startedAt;
        $this->finishedAt = $finishedAt;
    }

    /**
     * @param DiagnosticId $diagnosticId
     * @param UserId $userId
     * @param bool|null $is_finished
     * @param DateTimeImmutable|null $startedAt
     * @param DateTimeImmutable|null $finishedAt
     * @param InstanceId|null $id
     * @return self
     */
    public static function create(
        DiagnosticId $diagnosticId,
        UserId $userId,
        ?bool $is_finished = false,
        ?DateTimeImmutable $startedAt = null,
        ?DateTimeImmutable $finishedAt = null,
        ?InstanceId $id = null
    ): self {
        return new self(
            $id ?? new InstanceId(),
            $diagnosticId,
            $userId,
            $is_finished,
            $startedAt ?? new DateTimeImmutable(),
            $finishedAt
        );
    }



    public function getId(): InstanceId
    {
        return $this->id;
    }

    public function getDiagnosticId(): DiagnosticId
    {
        return $this->diagnosticId;
    }

    public function getUserId(): UserId
    {
        return $this->userId;
    }

    public function getIsFinished(): bool
    {
        return $this->is_finished;
    }

    public function setIsFinished(bool $isFinished): self
    {
        $this->is_finished = $isFinished;

        return $this;
    }

    public function getStartedAt(): DateTimeImmutable
    {
        return $this->startedAt;
    }

    public function getFinishedAt(): ?DateTimeImmutable
    {
        return $this->finishedAt;
    }

    public function setFinishedAt(DateTimeImmutable $finishedAt): self
    {
        $this->finishedAt = $finishedAt;

        return $this;
    }
}
