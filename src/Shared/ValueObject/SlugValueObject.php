<?php

namespace App\Shared\ValueObject;

use Webmozart\Assert\Assert;

abstract class SlugValueObject
{
    protected string $value;

    public function __construct(string $value)
    {
        Assert::regex($value, '/^[a-z0-9]+(?:-[a-z0-9]+)*$/');

        $this->value = $value;
    }

    public function getValue(): string
    {
        return $this->value;
    }
}
