<?php

declare(strict_types=1);

namespace VicGutt\PhpEnhancedEnum\Tests\TestSupport\Enums\HasValues;

use VicGutt\PhpEnhancedEnum\Concerns\HasValues;
use VicGutt\PhpEnhancedEnum\Contracts\HasValuesContract;

enum StatusEnum: string implements HasValuesContract
{
    use HasValues;

    case PENDING = 'pending';
    case SUCCEEDED = 'succeeded';
    case FAILED = 'failed';
}
