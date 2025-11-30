<?php

namespace App\Shared\Domain\ValueObject;

use Webmozart\Assert\Assert;

abstract class EmailValueObject
{
    protected string $value;

    public function __construct(string $value)
    {
        Assert::email($value);

        $this->value = $value;
    }

    public function getValue(): string
    {
        return $this->value;
    }
}
