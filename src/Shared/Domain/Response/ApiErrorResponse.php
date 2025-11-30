<?php

namespace App\Shared\Domain\Response;

use App\Shared\Domain\Response\AbstractResponse;

class ApiErrorResponse extends AbstractResponse implements ApiResponseInterface
{
    public function __construct(?string $message, int $resultCode)
    {
        return parent::__construct(
            false,
            $resultCode,
            $message,
            null
        );
    }

    public function getResultCode(): int
    {
        return $this->resultCode;
    }
}
