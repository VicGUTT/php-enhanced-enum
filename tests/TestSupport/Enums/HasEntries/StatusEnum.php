<?php

declare(strict_types=1);

namespace VicGutt\PhpEnhancedEnum\Tests\TestSupport\Enums\HasEntries;

use VicGutt\PhpEnhancedEnum\Concerns\HasEntries;
use VicGutt\PhpEnhancedEnum\Contracts\HasEntriesContract;

enum StatusEnum: string implements HasEntriesContract
{
    use HasEntries;

    case PENDING = 'pending';
    case SUCCEEDED = 'succeeded';
    case FAILED = 'failed';
}
