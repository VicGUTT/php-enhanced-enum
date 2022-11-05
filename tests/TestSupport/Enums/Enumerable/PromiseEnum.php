<?php

declare(strict_types=1);

namespace VicGutt\PhpEnhancedEnum\Tests\TestSupport\Enums\Enumerable;

use VicGutt\PhpEnhancedEnum\Concerns\Enumerable;
use VicGutt\PhpEnhancedEnum\Contracts\EnumerableContract;

enum PromiseEnum: int implements EnumerableContract
{
    use Enumerable;

    case PENDING = 1;
    case RESOLVED = 2; // case FULFILLED = 2;
    case REJECTED = 3;
}
