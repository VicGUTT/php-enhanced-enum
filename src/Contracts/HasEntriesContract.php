<?php

declare(strict_types=1);

namespace VicGutt\PhpEnhancedEnum\Contracts;

use BackedEnum;

/**
 * @mixin BackedEnum
 */
interface HasEntriesContract
{
    /**
     * Retrieve the enum's keys and values.
     */
    public static function entries(): array;
}
