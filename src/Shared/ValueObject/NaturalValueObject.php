<?php

namespace App\Shared\ValueObject;

use Webmozart\Assert\Assert;

abstract class NaturalValueObject
{
    protected int $value;

    public function __construct(int $value)
    {
        Assert::natural($value);

        $this->value = $value;
    }

    public function getValue(): int
    {
        return $this->value;
    }
}
