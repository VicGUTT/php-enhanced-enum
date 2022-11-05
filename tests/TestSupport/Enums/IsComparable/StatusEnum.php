<?php

declare(strict_types=1);

namespace VicGutt\PhpEnhancedEnum\Tests\TestSupport\Enums\IsComparable;

use VicGutt\PhpEnhancedEnum\Concerns\IsComparable;
use VicGutt\PhpEnhancedEnum\Contracts\IsComparableContract;

enum StatusEnum: string implements IsComparableContract
{
    use IsComparable;

    case PENDING = 'pending';
    case SUCCEEDED = 'succeeded';
    case FAILED = 'failed';
}
