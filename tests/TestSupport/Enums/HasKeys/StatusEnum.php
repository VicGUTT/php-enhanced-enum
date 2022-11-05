<?php

declare(strict_types=1);

namespace VicGutt\PhpEnhancedEnum\Tests\TestSupport\Enums\HasKeys;

use VicGutt\PhpEnhancedEnum\Concerns\HasKeys;
use VicGutt\PhpEnhancedEnum\Contracts\HasKeysContract;

enum StatusEnum: string implements HasKeysContract
{
    use HasKeys;

    case PENDING = 'pending';
    case SUCCEEDED = 'succeeded';
    case FAILED = 'failed';
}
