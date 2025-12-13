<?php

namespace App\Shared\Domain\Exception;

interface ApiExceptionInterface
{
    const HTTP_OK = 200;
    const HTTP_CREATED = 201;
    const HTTP_BAD_REQUEST = 400;

    public function getStatusCode(): int;

    public function getMessage(): string;
}
