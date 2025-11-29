<?php

namespace App\Diagnostic\Domain\Model\DiagnosticInstance;

use App\Diagnostic\Domain\ValueObject\Common\Natural;
use App\Diagnostic\Domain\ValueObject\Shared\DiagnosticKeyId;
use App\Diagnostic\Domain\ValueObject\DiagnosticInstance\InstanceId;
use App\Diagnostic\Domain\ValueObject\DiagnosticInstance\InstanceScopeId;




final class InstanceScore
{
    private InstanceScopeId $id;
    private InstanceId $instanceId;
    private DiagnosticKeyId $keyId;
    private Natural $score;
    private Natural $result;

    /**
     * @param InstanceScopeId $id
     * @param InstanceId $instanceId
     * @param DiagnosticKeyId $keyId
     * @param Natural $score
     * @param Natural $result
     */
    private function __construct(
        InstanceScopeId $id,
        InstanceId $instanceId,
        DiagnosticKeyId $keyId,
        Natural $score,
        Natural $result
    ) {
        $this->id = $id;
        $this->instanceId = $instanceId;
        $this->keyId = $keyId;
        $this->score = $score;
        $this->result = $result;
    }

    /**
     * @param InstanceId $instanceId
     * @param DiagnosticKeyId $keyId
     * @param Natural $score
     * @param Natural $result
     * @param InstanceScopeId|null $id
     * @return self
     */
    public static function create(
        InstanceId $instanceId,
        DiagnosticKeyId $keyId,
        Natural $score,
        Natural $result,
        ?InstanceScopeId $id = null
    ): self {
        return new self(
            $id ?? new InstanceScopeId(),
            $instanceId,
            $keyId,
            $score,
            $result
        );
    }

    /**
     * @return InstanceScopeId
     */
    public function getId(): InstanceScopeId
    {
        return $this->id;
    }

    public function getInstance(): InstanceId
    {
        return $this->instanceId;
    }

    public function getKey(): DiagnosticKeyId
    {
        return $this->keyId;
    }

    public function getScore(): Natural
    {
        return $this->score;
    }

    public function getResult(): Natural
    {
        return $this->result;
    }
}
