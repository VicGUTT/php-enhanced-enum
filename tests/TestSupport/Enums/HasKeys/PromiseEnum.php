<?php

declare(strict_types=1);

namespace VicGutt\PhpEnhancedEnum\Tests\TestSupport\Enums\HasKeys;

use VicGutt\PhpEnhancedEnum\Concerns\HasKeys;
use VicGutt\PhpEnhancedEnum\Contracts\HasKeysContract;

enum PromiseEnum: int implements HasKeysContract
{
    use HasKeys;

    case PENDING = 1;
    case RESOLVED = 2; // case FULFILLED = 2;
    case REJECTED = 3;
}
