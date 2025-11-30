<?php

namespace App\Shared\Domain\ValueObject;

use Webmozart\Assert\Assert;

abstract class PasswordValueObject
{
    protected string $value;

    public function __construct(string $value)
    {
        Assert::regex($value, '/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[\W_]).{8,}$/');

        $this->value = $value;
    }

    public function getValue(): string
    {
        return $this->value;
    }
}
