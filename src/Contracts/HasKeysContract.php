<?php

declare(strict_types=1);

namespace VicGutt\PhpEnhancedEnum\Contracts;

use UnitEnum;

/**
 * @mixin UnitEnum
 */
interface HasKeysContract
{
    /**
     * Retrieve the enum's case names.
     */
    public static function keys(): array;
}
