<?php

namespace App\Diagnostic\Domain\Model\Diagnostic;

use App\Diagnostic\Domain\ValueObject\Shared\UserId;
use App\Diagnostic\Domain\ValueObject\Diagnostic\LikeId;
use App\Diagnostic\Domain\ValueObject\Shared\DiagnosticId;



final class Like
{
    private LikeId $id;
    private DiagnosticId $diagnosticId;
    private UserId $userId;

    /**
     * @param LikeId $id
     * @param DiagnosticId $diagnosticId
     * @param UserId $userId
     */
    private function __construct(
        LikeId $id,
        DiagnosticId $diagnosticId,
        UserId $userId
    ) {
        $this->id = $id;
        $this->diagnosticId = $diagnosticId;
        $this->userId = $userId;
    }

    /**
     * @param LikeId $id
     * @param DiagnosticId $diagnosticId
     * @param UserId $userId
     * @return self
     */
    public static function create(
        LikeId $id,
        DiagnosticId $diagnosticId,
        UserId $userId
    ): self {
        return new self($id, $diagnosticId, $userId);
    }

    public function getId(): LikeId
    {
        return $this->id;
    }

    public function getDiagnosticId(): DiagnosticId
    {
        return $this->diagnosticId;
    }

    public function getUser(): UserId
    {
        return $this->userId;
    }
}
