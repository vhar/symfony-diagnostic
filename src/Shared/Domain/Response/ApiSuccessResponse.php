<?php

namespace App\Shared\Domain\Response;

use App\Shared\Domain\Response\AbstractResponse;

class ApiSuccessResponse extends AbstractResponse implements ApiResponseInterface
{
    public function __construct(?string $message, int $resultCode, mixed $data)
    {
        return parent::__construct(
            true,
            $resultCode,
            $message,
            $data
        );
    }

    public function getResultCode(): int
    {
        return $this->resultCode;
    }
}
