<?php

namespace App\Shared\Domain\Response;

abstract class AbstractResponse
{
    public function __construct(
        public readonly bool $success,
        public readonly int $resultCode,
        public readonly ?string $message,
        public readonly mixed $data,
    ) {
        //
    }
}
