<?php

declare(strict_types=1);

namespace VicGutt\PhpEnhancedEnum\Contracts;

use UnitEnum;
use BackedEnum;

/**
 * @mixin UnitEnum
 * @mixin BackedEnum
 */
interface IsComparableContract
{
    /**
     * Retrieve the enum's keys and values.
     */
    public function is(UnitEnum|BackedEnum|int|string $value): bool;

    /**
     * Retrieve the enum's keys and values.
     *
     * @param array<array-key, UnitEnum|BackedEnum|int|string> $values
     */
    public function isAny(array $values): bool;

    /**
     * Retrieve the enum's keys and values.
     *
     * @param array<array-key, UnitEnum|BackedEnum|int|string> $values
     */
    public function isAll(array $values): bool;
}
