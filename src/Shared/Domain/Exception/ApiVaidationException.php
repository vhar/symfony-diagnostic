<?php

namespace App\Shared\Domain\Exception;

class ApiVaidationException extends \Exception implements ApiExceptionInterface
{
    public function __construct(array $violations)
    {
        $message = implode('. ', $violations);

        return parent::__construct($message, ApiExceptionInterface::HTTP_BAD_REQUEST);
    }

    public function getStatusCode(): int
    {
        return ApiExceptionInterface::HTTP_BAD_REQUEST;
    }
}
