<?php

declare(strict_types=1);

namespace VicGutt\PhpEnhancedEnum\Concerns;

use UnitEnum;
use BackedEnum;
use ReflectionEnum;

/**
 * @mixin UnitEnum
 * @mixin BackedEnum
 */
trait HasEntries
{
    /**
     * Retrieve the enum's keys and values.
     */
    public static function entries(): array
    {
        return array_map(
            static fn (UnitEnum $enum): string|int => $enum instanceof BackedEnum ? $enum->value : $enum->name,
            (new ReflectionEnum(static::class))->getConstants(),
        );
    }
}
