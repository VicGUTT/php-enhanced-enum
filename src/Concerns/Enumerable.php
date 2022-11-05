<?php

declare(strict_types=1);

namespace VicGutt\PhpEnhancedEnum\Concerns;

use UnitEnum;
use BackedEnum;

/**
 * @mixin UnitEnum
 * @mixin BackedEnum
 */
trait Enumerable
{
    use HasKeys;
    use HasValues;
    use HasEntries;
    use IsComparable;
}
