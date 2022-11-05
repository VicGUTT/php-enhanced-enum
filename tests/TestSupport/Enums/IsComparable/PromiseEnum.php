<?php

declare(strict_types=1);

namespace VicGutt\PhpEnhancedEnum\Tests\TestSupport\Enums\IsComparable;

use VicGutt\PhpEnhancedEnum\Concerns\IsComparable;
use VicGutt\PhpEnhancedEnum\Contracts\IsComparableContract;

enum PromiseEnum: int implements IsComparableContract
{
    use IsComparable;

    case PENDING = 1;
    case RESOLVED = 2; // case FULFILLED = 2;
    case REJECTED = 3;
}
