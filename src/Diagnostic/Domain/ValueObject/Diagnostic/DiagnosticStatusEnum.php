<?php

namespace App\Diagnostic\Domain\ValueObject\Diagnostic;

enum DiagnosticStatusEnum: int
{
    case DRAFT = 1;
    case MODERATION = 2;
    case PUBLISHED = 3;
    case NOT_PUBLISHED = 4;
    case FINISHED = 5;

    public function readableOption(): string
    {
        return match ($this) {
            self::DRAFT => 'Черновик',
            self::MODERATION => 'На проверке',
            self::PUBLISHED => 'Опубликован',
            self::NOT_PUBLISHED => 'Отклонен',
            self::FINISHED => 'Завершен',
        };
    }

    public static function names(): array
    {
        return array_column(self::cases(), 'name');
    }
}
