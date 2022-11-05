<?php

declare(strict_types=1);

namespace VicGutt\PhpEnhancedEnum\Concerns;

use UnitEnum;
use BackedEnum;

/**
 * @mixin UnitEnum
 * @mixin BackedEnum
 */
trait HasValues
{
    /**
     * Retrieve the enum's case values.
     */
    public static function values(): array
    {
        return array_map(
            static fn (UnitEnum $enum): string|int => $enum instanceof BackedEnum ? $enum->value : $enum->name,
            static::cases(),
        );
        // return array_map(static fn (BackedEnum $case): string|int => $case->value, static::cases());
    }
}
