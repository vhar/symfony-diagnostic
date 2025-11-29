<?php

namespace App\Diagnostic\Infrastructure\Persistence\Doctrine;

use Doctrine\ORM\Mapping as ORM;
use App\Diagnostic\Domain\ValueObject\Diagnostic\AgeRestrictionEnum;
use App\Diagnostic\Domain\ValueObject\Diagnostic\DiagnosticStatusEnum;


#[ORM\Entity]
#[ORM\Table(name: 'diagnostics')]
class DiagnosticEntity
{
    #[ORM\Id]
    #[ORM\Column(type: 'guid')]
    private string $id;

    #[ORM\Column(type: 'string', length: 255, unique: true)]
    private string $slug;

    #[ORM\Column(type: 'guid')]
    private string $author_id;

    #[ORM\Column(type: 'integer', enumType: DiagnosticStatusEnum::class)]
    private DiagnosticStatusEnum $status;

    #[ORM\Column(type: 'string', length: 255)]
    private string $title;

    #[ORM\Column(type: 'text')]
    private string $description;

    #[ORM\Column(type: 'string', length: 255)]
    private string $image;

    #[ORM\Column(type: 'datetimetz_immutable')]
    private \DateTimeImmutable $created_at;

    #[ORM\Column(type: 'boolean')]
    private bool $is_paid;

    #[ORM\Column(type: 'integer')]
    private int $attempts;

    #[ORM\Column(type: 'boolean')]
    private bool $change_answer;

    #[ORM\Column(type: 'integer', enumType: AgeRestrictionEnum::class)]
    private AgeRestrictionEnum $age_restriction;

    #[ORM\Column(type: 'string', length: 4)]
    private string $sort_keys;

    #[ORM\Column(type: 'integer')]
    private int $show_max_keys;

    #[ORM\Column(type: 'boolean')]
    private bool $is_on_time;

    #[ORM\Column(type: 'integer', nullable: true)]
    private ?int $allotted_time = null;

    /**
     * @param string $id
     * @param string $slug
     * @param string $author_id
     * @param DiagnosticStatusEnum $status
     * @param string $title
     * @param string $description
     * @param string $image
     * @param \DateTimeImmutable $created_at
     * @param bool $is_paid
     * @param int $attempts
     * @param bool $change_answer
     * @param AgeRestrictionEnum $age_restriction
     * @param string $sort_keys
     * @param int $show_max_keys
     * @param bool $is_on_time
     * @param ?int $allotted_time
     */
    public function __construct(string $id, string $slug, string $author_id, DiagnosticStatusEnum $status, string $title, string $description, string $image, \DateTimeImmutable $created_at, bool $is_paid, int $attempts, bool $change_answer, AgeRestrictionEnum $age_restriction, string $sort_keys, int $show_max_keys, bool $is_on_time, ?int $allotted_time = null)
    {
        $this->id = $id;
        $this->slug = $slug;
        $this->author_id = $author_id;
        $this->status = $status;
        $this->title = $title;
        $this->description = $description;
        $this->image = $image;
        $this->created_at = $created_at;
        $this->is_paid = $is_paid;
        $this->attempts = $attempts;
        $this->change_answer = $change_answer;
        $this->age_restriction = $age_restriction;
        $this->sort_keys = $sort_keys;
        $this->show_max_keys = $show_max_keys;
        $this->is_on_time = $is_on_time;
        $this->allotted_time = $allotted_time;
    }

    public function getId(): string
    {
        return $this->id;
    }

    public function getSlug(): string
    {
        return $this->slug;
    }

    public function getStatus(): DiagnosticStatusEnum
    {
        return $this->status;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function getImage(): string
    {
        return $this->image;
    }

    public function getCreatedAt(): \DateTimeImmutable
    {
        return $this->created_at;
    }

    public function getIsPaid(): bool
    {
        return $this->is_paid;
    }

    public function getAttempts(): int
    {
        return $this->attempts;
    }

    public function getIsChangeAnswer(): bool
    {
        return $this->change_answer;
    }

    public function getAgeRestriction(): AgeRestrictionEnum
    {
        return $this->age_restriction;
    }

    public function getSortKeys(): string
    {
        return $this->sort_keys;
    }

    public function getShowMaxKeys(): int
    {
        return $this->show_max_keys;
    }

    public function getIsOnTime(): bool
    {
        return $this->is_on_time;
    }

    public function getAllottedTime(): ?int
    {
        return $this->allotted_time;
    }

    public function getAuthorId(): string
    {
        return $this->author_id;
    }
}
