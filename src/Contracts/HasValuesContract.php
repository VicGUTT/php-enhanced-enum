<?php

declare(strict_types=1);

namespace VicGutt\PhpEnhancedEnum\Contracts;

use BackedEnum;

/**
 * @mixin BackedEnum
 */
interface HasValuesContract
{
    /**
     * Retrieve the enum's case values.
     */
    public static function values(): array;
}
