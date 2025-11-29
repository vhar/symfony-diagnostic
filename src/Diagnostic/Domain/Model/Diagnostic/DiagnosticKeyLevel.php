<?php

namespace App\Diagnostic\Domain\Model\Diagnostic;

use App\Diagnostic\Domain\ValueObject\Common\Title;
use App\Diagnostic\Domain\ValueObject\Common\Natural;
use App\Diagnostic\Domain\ValueObject\Shared\DiagnosticKeyId;
use App\Diagnostic\Domain\ValueObject\Diagnostic\DiagnosticKeyLevelId;


final class DiagnosticKeyLevel
{
    private DiagnosticKeyLevelId $id;
    private DiagnosticKeyId $diagnosticKeyId;
    private Title $name;
    private Natural $scoreMin;
    private Natural $scoreMax;

    /**
     * @param DiagnosticKeyLevelId $id
     * @param DiagnosticKeyId $diagnosticKey
     * @param Title $name
     * @param Natural $scoreMin
     * @param Natural $scoreMax
     */
    private function __construct(
        DiagnosticKeyLevelId $id,
        DiagnosticKeyId $diagnosticKeyId,
        Title $name,
        Natural $scoreMin,
        Natural $scoreMax

    ) {
        $this->id = $id;
        $this->diagnosticKeyId = $diagnosticKeyId;
        $this->name = $name;
        $this->scoreMin = $scoreMin;
        $this->scoreMax = $scoreMax;
    }

    /**
     * @param DiagnosticKeyLevelId $id
     * @param DiagnosticKeyId $diagnosticKeyId
     * @param Title $name
     * @param Natural $scoreMin
     * @param Natural $scoreMax
     * @return self
     */
    public static function create(
        DiagnosticKeyLevelId $id,
        DiagnosticKeyId $diagnosticKeyId,
        Title $name,
        Natural $scoreMin,
        Natural $scoreMax
    ): self {
        return new self(
            $id,
            $diagnosticKeyId,
            $name,
            $scoreMin,
            $scoreMax
        );
    }

    public function getId(): DiagnosticKeyLevelId
    {
        return $this->id;
    }

    public function getDiagnosticKeyId(): DiagnosticKeyId
    {
        return $this->diagnosticKeyId;
    }

    public function getName(): Title
    {
        return $this->name;
    }

    public function getScoreMin(): Natural
    {
        return $this->scoreMin;
    }

    public function getScoreMax(): Natural
    {
        return $this->scoreMax;
    }
}
