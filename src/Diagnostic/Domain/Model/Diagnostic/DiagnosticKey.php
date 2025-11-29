<?php

namespace App\Diagnostic\Domain\Model\Diagnostic;

use App\Diagnostic\Domain\ValueObject\Common\Url;
use App\Diagnostic\Domain\ValueObject\Common\Text;
use App\Diagnostic\Domain\ValueObject\Common\Title;
use App\Diagnostic\Domain\ValueObject\Common\SortOrder;
use App\Diagnostic\Domain\ValueObject\Shared\DiagnosticId;
use App\Diagnostic\Domain\ValueObject\Shared\DiagnosticKeyId;


final class DiagnosticKey
{
    private DiagnosticKeyId $id;
    private DiagnosticId $diagnosticId;
    private Title $name;
    private Text $description;
    private SortOrder $sort;
    private ?Url $image;

    /**
     * @param DiagnosticKeyId $id
     * @param DiagnosticId $diagnosticId
     * @param Title $name
     * @param Text $description
     * @param SortOrder $sort
     * @param Url|null $image
     */
    private function __construct(
        DiagnosticKeyId $id,
        DiagnosticId $diagnosticId,
        Title $name,
        Text $description,
        SortOrder $sort,
        ?Url $image,
    ) {
        $this->id = $id;
        $this->diagnosticId = $diagnosticId;
        $this->name = $name;
        $this->description = $description;
        $this->sort = $sort;
        $this->image = $image;
    }

    /**
     * @param DiagnosticKeyId $id
     * @param DiagnosticId $diagnosticId
     * @param Title $name
     * @param Text $description
     * @param SortOrder $sort
     * @param Url|null $image
     * @return self
     */
    public static function create(
        DiagnosticKeyId $id,
        DiagnosticId $diagnosticId,
        Title $name,
        Text $description,
        SortOrder $sort,
        ?Url $image = null
    ): self {
        return new self(
            $id,
            $diagnosticId,
            $name,
            $description,
            $sort,
            $image
        );
    }

    public function getId(): DiagnosticKeyId
    {
        return $this->id;
    }

    public function getDiagnosticId(): DiagnosticId
    {
        return $this->diagnosticId;
    }

    public function getName(): Title
    {
        return $this->name;
    }

    public function getDescription(): Text
    {
        return $this->description;
    }

    public function getSort(): SortOrder
    {
        return $this->sort;
    }

    public function getImage(): ?Url
    {
        return $this->image;
    }
}
