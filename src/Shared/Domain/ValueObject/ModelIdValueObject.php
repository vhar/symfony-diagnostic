<?php

namespace App\Shared\Domain\ValueObject;

use Ramsey\Uuid\Uuid;
use Webmozart\Assert\Assert;

abstract class ModelIdValueObject
{
    protected ?string $value;

    public function __construct(?string $value = null)
    {
        if ($value) {
            Assert::uuid($value);
        } else {
            $value = Uuid::uuid4()->toString();
        }

        $this->value = $value;
    }

    public function getValue(): string
    {
        return $this->value;
    }
}
