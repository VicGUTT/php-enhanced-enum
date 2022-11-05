<?php

declare(strict_types=1);

namespace VicGutt\PhpEnhancedEnum\Tests\TestSupport\Enums\Enumerable;

use VicGutt\PhpEnhancedEnum\Concerns\Enumerable;
use VicGutt\PhpEnhancedEnum\Contracts\EnumerableContract;

enum StatusEnum: string implements EnumerableContract
{
    use Enumerable;

    case PENDING = 'pending';
    case SUCCEEDED = 'succeeded';
    case FAILED = 'failed';
}
