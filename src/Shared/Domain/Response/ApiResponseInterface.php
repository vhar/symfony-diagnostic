<?php

namespace App\Shared\Domain\Response;

interface ApiResponseInterface
{
    public function getResultCode(): int;
}
