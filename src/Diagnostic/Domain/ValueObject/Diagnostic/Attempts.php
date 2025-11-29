<?php

namespace App\Diagnostic\Domain\ValueObject\Diagnostic;

use Webmozart\Assert\Assert;

class Attempts
{
    private int $value;

    public function __construct(int $value)
    {
        Assert::integer($value);
        Assert::greaterThanEq($value, -1);
        Assert::notEq($value, 0);

        $this->value = $value;
    }

    /**
     * Get the value of value
     */
    public function getValue(): int
    {
        return $this->value;
    }
}
