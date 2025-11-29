<?php

namespace App\Shared\ValueObject;

use Webmozart\Assert\Assert;

abstract class TitleValueObject
{
    protected string $value;

    public function __construct(string $value)
    {
        Assert::string($value);
        Assert::minLength($value, 3);
        Assert::maxLength($value, 255);

        $this->value = $value;
    }

    public function getValue(): string
    {
        return $this->value;
    }
}
