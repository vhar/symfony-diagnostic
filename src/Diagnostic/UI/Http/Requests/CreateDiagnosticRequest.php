<?php

namespace App\Diagnostic\UI\Http\Requests;

use Symfony\Component\Validator\Constraints as Assert;
use App\Diagnostic\Domain\ValueObject\Diagnostic\AgeRestrictionEnum;
use App\Diagnostic\Domain\ValueObject\Diagnostic\DiagnosticStatusEnum;


final class CreateDiagnosticRequest
{
    public function __construct(
        #[Assert\Type('string')]
        public ?string $slug,

        #[Assert\Uuid]
        #[Assert\NotNull]
        public string $authorId,

        #[Assert\Choice(callback: [DiagnosticStatusEnum::class, 'names'])]
        public ?string $status,

        #[Assert\Type('string')]
        #[Assert\NotNull]
        #[Assert\Length(min: 3)]
        public string $title,

        #[Assert\Type('string')]
        #[Assert\NotNull]
        #[Assert\Length(min: 3)]
        public string $description,

        #[Assert\Url]
        public ?string $image,

        #[Assert\Type('boolean')]
        public ?bool $isPaid,

        #[Assert\Type('integer')]
        #[Assert\GreaterThanOrEqual(-1)]
        #[Assert\NotEqualTo(0)]
        public ?int $attempts,

        #[Assert\Type('boolean')]
        public ?bool $changeAnswer,

        #[Assert\Choice(callback: [AgeRestrictionEnum::class, 'values'])]
        public ?int $ageRestriction,

        #[Assert\Choice(['ASC', 'DESC'])]
        public ?string $sortKeys,

        #[Assert\Type('integer')]
        public ?int $showMaxKeys,

        #[Assert\Type('boolean')]
        public ?bool $isOnTime,

        #[Assert\Type('integer')]
        public ?int $allottedTime,
    ) {}
}
