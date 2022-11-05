<?php

declare(strict_types=1);

namespace VicGutt\PhpEnhancedEnum\Concerns;

use UnitEnum;
use Throwable;
use BackedEnum;

/**
 * @mixin UnitEnum
 * @mixin BackedEnum
 */
trait IsComparable
{
    /**
     * Checks if a given value is equal to itself.
     */
    public function is(UnitEnum|BackedEnum|int|string $value): bool
    {
        if ($this instanceof BackedEnum) {
            return $this->checkEquivalenceFromABackedEnum($value);
        }

        return $this->checkEquivalenceFromAUnitEnum($value);
        // if (!($value instanceof static)) {
        //     $value = static::from($value);
        // }

        // return $this === $value;
    }

    /**
     * Checks if any of the given values are equal to itself.
     *
     * @param array<array-key, UnitEnum|BackedEnum|int|string> $values
     */
    public function isAny(array $values): bool
    {
        foreach ($values as $value) {
            if ($this->is($value)) {
                return true;
            }
        }

        return false;
    }

    /**
     * Checks if all of the given values are equal to itself.
     *
     * @param array<array-key, UnitEnum|BackedEnum|int|string> $values
     */
    public function isAll(array $values): bool
    {
        foreach ($values as $value) {
            if (!$this->is($value)) {
                return false;
            }
        }

        return true;
    }

    protected function checkEquivalenceFromABackedEnum(UnitEnum|BackedEnum|int|string $value): bool
    {
        if (!($value instanceof static)) {
            try {
                $value = static::tryFrom($value);
            } catch (Throwable $th) {
                return false; // Ex.: `$this` is an integer type BackedEnum but `$value` is a string or a different Enum
            }
        }

        return $this === $value;
    }

    protected function checkEquivalenceFromAUnitEnum(UnitEnum|BackedEnum|int|string $value): bool
    {
        if ($this === $value) {
            return true;
        }

        if ($value instanceof BackedEnum) {
            return false;
        }

        if (is_int($value)) {
            return false;
        }

        return $this->name === $value;
    }
}
