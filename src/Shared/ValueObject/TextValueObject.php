<?php

namespace App\Shared\ValueObject;

use Webmozart\Assert\Assert;

abstract class TextValueObject
{
    protected string $value;

    public function __construct(string $value)
    {
        Assert::string($value);
        Assert::minLength($value, 3);

        $this->value = $value;
    }

    public function getValue(): string
    {
        return $this->value;
    }
}
