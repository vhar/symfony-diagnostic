<?php

namespace App\Diagnostic\Domain\ValueObject\Diagnostic;

enum AnswerTypeEnum: int
{
    case SINGLE = 1;
    case MULTIPLE = 2;
    case FREE = 3;

    public function readableOption(): string
    {
        return match ($this) {
            self::SINGLE => 'Одиночный выбор',
            self::MULTIPLE => 'Множественный выбор',
            self::FREE => 'Свободный ввод',
        };
    }

    public static function fromOption($option): self
    {
        return match ($option) {
            'Одиночный выбор' => self::SINGLE,
            'Множественный выбор' => self::MULTIPLE,
            'Свободный ввод' => self::FREE,
            default => self::SINGLE
        };
    }
}
