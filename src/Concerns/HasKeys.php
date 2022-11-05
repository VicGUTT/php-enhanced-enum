<?php

declare(strict_types=1);

namespace VicGutt\PhpEnhancedEnum\Concerns;

use UnitEnum;

/**
 * @mixin UnitEnum
 */
trait HasKeys
{
    /**
     * Retrieve the enum's case names.
     */
    public static function keys(): array
    {
        return array_map(static fn (UnitEnum $case): string => $case->name, static::cases());
    }
}
