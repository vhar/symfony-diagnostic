<?php

namespace App\Shared\ValueObject;

use Exception;
use Webmozart\Assert\Assert;

abstract class SortOrderValueObject
{
    protected string $value;

    public function __construct(string $value)
    {
        Assert::string($value);
        $this->assertIsValid($value);

        $this->value = $value;
    }

    public function getValue(): string
    {
        return $this->value;
    }

    private function assertIsValid($value): bool
    {
        if (!in_array(strtolower($value), ['asc', 'desc'])) {
            $message = sprintf('Value "%s" was expected to be a valid sort order string', $value);
            throw new Exception($message);
        }

        return true;
    }
}
