<?php

namespace App\Diagnostic\Domain\Model\Diagnostic;

use DateTimeImmutable;
use App\Diagnostic\Domain\ValueObject\Common\Url;
use App\Diagnostic\Domain\ValueObject\Common\Text;
use App\Diagnostic\Domain\ValueObject\Common\Title;
use App\Diagnostic\Domain\ValueObject\Common\Natural;
use App\Diagnostic\Domain\ValueObject\Diagnostic\Slug;
use App\Diagnostic\Domain\ValueObject\Common\SortOrder;
use App\Diagnostic\Domain\ValueObject\Diagnostic\Attempts;
use App\Diagnostic\Domain\ValueObject\Diagnostic\AuthorId;
use App\Diagnostic\Domain\ValueObject\Shared\DiagnosticId;
use App\Diagnostic\Domain\ValueObject\Diagnostic\AgeRestrictionEnum;
use App\Diagnostic\Domain\ValueObject\Diagnostic\DiagnosticStatusEnum;


final class Diagnostic
{
    private DiagnosticId $id;
    private Slug $slug;
    private AuthorId $authorId;
    private DiagnosticStatusEnum $status;
    private Title $title;
    private Text $description;
    private Url $image;
    private DateTimeImmutable $createdAt;
    private bool $isPaid;
    private Attempts $attempts;
    private bool $changeAnswer;
    private AgeRestrictionEnum $ageRestriction;
    private SortOrder $sortKeys;
    private Natural $showMaxKeys;
    private bool $isOnTime;
    private ?Natural $allottedTime;

    /**
     * @param DiagnosticId $id
     * @param Slug $slug
     * @param AuthorId $authorId
     * @param DiagnosticStatusEnum $status
     * @param Title $title
     * @param Text $description
     * @param Url $image
     * @param DateTimeImmutable $createdAt
     * @param bool $isPaid
     * @param Attempts $attempts
     * @param bool $changeAnswer
     * @param AgeRestrictionEnum $ageRestriction
     * @param SortOrder $sortKeys
     * @param Natural $showMaxKeys
     * @param bool $isOnTime
     * @param Natural|null $allottedTime
     */
    private function __construct(
        DiagnosticId $id,
        Slug $slug,
        AuthorId $authorId,
        DiagnosticStatusEnum $status,
        Title $title,
        Text $description,
        Url $image,
        DateTimeImmutable $createdAt,
        bool $isPaid,
        Attempts $attempts,
        bool $changeAnswer,
        AgeRestrictionEnum $ageRestriction,
        SortOrder $sortKeys,
        Natural $showMaxKeys,
        bool $isOnTime,
        ?Natural $allottedTime,
    ) {
        $this->id = $id;
        $this->slug = $slug;
        $this->authorId = $authorId;
        $this->status = $status;
        $this->title = $title;
        $this->description = $description;
        $this->image = $image;
        $this->createdAt = $createdAt;
        $this->isPaid = $isPaid;
        $this->attempts = $attempts;
        $this->changeAnswer = $changeAnswer;
        $this->ageRestriction = $ageRestriction;
        $this->sortKeys = $sortKeys;
        $this->showMaxKeys = $showMaxKeys;
        $this->isOnTime = $isOnTime;
        $this->allottedTime = $allottedTime;
    }

    /**
     * @param DiagnosticId|null $id
     * @param Slug $slug
     * @param AuthorId $authorId
     * @param DiagnosticStatusEnum $status
     * @param Title $title
     * @param Text $description
     * @param Url $image
     * @param bool $isPaid
     * @param Attempts $attempts
     * @param bool $changeAnswer
     * @param AgeRestrictionEnum $ageRestriction
     * @param SortOrder $sortKeys
     * @param Natural $showMaxKeys
     * @param bool $isOnTime
     * @param Natural|null $allottedTime
     * @return self
     */
    public static function create(
        Slug $slug,
        AuthorId $authorId,
        DiagnosticStatusEnum $status,
        Title $title,
        Text $description,
        Url $image,
        bool $isPaid,
        Attempts $attempts,
        bool $changeAnswer,
        AgeRestrictionEnum $ageRestriction,
        SortOrder $sortKeys,
        Natural $showMaxKeys,
        bool $isOnTime,
        ?Natural $allottedTime = null,
        ?DiagnosticId $id = null,
    ): self {
        $self = new self(
            $id ?? new DiagnosticId(),
            $slug,
            $authorId,
            $status,
            $title,
            $description,
            $image,
            new DateTimeImmutable(),
            $isPaid,
            $attempts,
            $changeAnswer,
            $ageRestriction,
            $sortKeys,
            $showMaxKeys,
            $isOnTime,
            $allottedTime,
        );

        return $self;
    }

    public function getId(): DiagnosticId
    {
        return $this->id;
    }

    /** 
     * @return Slug 
     */
    public function getSlug(): Slug
    {
        return $this->slug;
    }

    public function getAuthorId(): AuthorId
    {
        return $this->authorId;
    }

    public function getStatus(): DiagnosticStatusEnum
    {
        return $this->status;
    }

    public function getTitle(): Title
    {
        return $this->title;
    }

    public function getDescription(): Text
    {
        return $this->description;
    }

    public function getImage(): Url
    {
        return $this->image;
    }

    public function getIsPaid(): bool
    {
        return $this->isPaid;
    }

    public function getAttempts(): Attempts
    {
        return $this->attempts;
    }

    public function getChangeAnswer(): bool
    {
        return $this->changeAnswer;
    }

    public function getAgeRestriction(): AgeRestrictionEnum
    {
        return $this->ageRestriction;
    }

    public function getSortKeys(): SortOrder
    {
        return $this->sortKeys;
    }

    public function getShowMaxKeys(): Natural
    {
        return $this->showMaxKeys;
    }

    public function getIsOnTime(): bool
    {
        return $this->isOnTime;
    }

    public function getAllottedTime(): ?Natural
    {
        return $this->allottedTime;
    }

    public function getCreatedAt(): DateTimeImmutable
    {
        return $this->createdAt;
    }
}
