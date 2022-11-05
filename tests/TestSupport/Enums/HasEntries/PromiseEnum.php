<?php

declare(strict_types=1);

namespace VicGutt\PhpEnhancedEnum\Tests\TestSupport\Enums\HasEntries;

use VicGutt\PhpEnhancedEnum\Concerns\HasEntries;
use VicGutt\PhpEnhancedEnum\Contracts\HasEntriesContract;

enum PromiseEnum: int implements HasEntriesContract
{
    use HasEntries;

    case PENDING = 1;
    case RESOLVED = 2; // case FULFILLED = 2;
    case REJECTED = 3;
}
