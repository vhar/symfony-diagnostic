<?php

namespace App\Diagnostic\Application\Command\CreateDiagnostic;

use App\Diagnostic\Domain\ValueObject\Common\Url;
use App\Diagnostic\Domain\ValueObject\Common\Text;
use App\Diagnostic\Domain\ValueObject\Common\Title;
use App\Diagnostic\Domain\ValueObject\Common\Natural;
use App\Diagnostic\Domain\ValueObject\Diagnostic\Slug;
use App\Diagnostic\Domain\ValueObject\Common\SortOrder;
use App\Diagnostic\Domain\ValueObject\Diagnostic\Attempts;
use App\Diagnostic\Domain\ValueObject\Diagnostic\AuthorId;
use App\Diagnostic\Domain\ValueObject\Diagnostic\AgeRestrictionEnum;
use App\Diagnostic\Domain\ValueObject\Diagnostic\DiagnosticStatusEnum;



final readonly class CreateDiagnosticCommand
{
    public Slug $slug;
    public AuthorId $authorId;
    public DiagnosticStatusEnum $status;
    public Title $title;
    public Text $description;
    public Url $image;
    public bool $isPaid;
    public Attempts $attempts;
    public bool $changeAnswer;
    public AgeRestrictionEnum $ageRestriction;
    public SortOrder $sortKeys;
    public Natural $showMaxKeys;
    public bool $isOnTime;
    public Natural|null $allottedTime;

    /**
     * @param string $slug
     * @param string $authorId
     * @param int $status
     * @param string $title
     * @param string $description
     * @param string $image
     * @param bool $isPaid
     * @param int $attempts
     * @param bool $changeAnswer
     * @param int $ageRestriction
     * @param string $sortKeys
     * @param int $showMaxKeys
     * @param bool $isOnTime
     * @param int|null $allottedTime
     */
    public function __construct(
        string $slug,
        string $authorId,
        int $status,
        string $title,
        string $description,
        string $image,
        bool $isPaid,
        int $attempts,
        bool $changeAnswer,
        int $ageRestriction,
        string $sortKeys,
        int $showMaxKeys,
        bool $isOnTime,
        ?int $allottedTime = null
    ) {
        $this->slug = new Slug($slug);
        $this->authorId = new AuthorId($authorId);
        $this->status = DiagnosticStatusEnum::from($status);
        $this->title = new Title($title);
        $this->description = new Text($description);
        $this->image = new Url($image);
        $this->isPaid = $isPaid;
        $this->attempts = new Attempts($attempts);
        $this->changeAnswer = $changeAnswer;
        $this->ageRestriction = AgeRestrictionEnum::from($ageRestriction);
        $this->sortKeys = new SortOrder($sortKeys);
        $this->showMaxKeys = new Natural($showMaxKeys);
        $this->isOnTime = $isOnTime;
        $this->allottedTime = $allottedTime ? new Natural($allottedTime) : null;
    }
}
