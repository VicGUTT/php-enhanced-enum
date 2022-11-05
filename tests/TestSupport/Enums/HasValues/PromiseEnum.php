<?php

declare(strict_types=1);

namespace VicGutt\PhpEnhancedEnum\Tests\TestSupport\Enums\HasValues;

use VicGutt\PhpEnhancedEnum\Concerns\HasValues;
use VicGutt\PhpEnhancedEnum\Contracts\HasValuesContract;

enum PromiseEnum: int implements HasValuesContract
{
    use HasValues;

    case PENDING = 1;
    case RESOLVED = 2; // case FULFILLED = 2;
    case REJECTED = 3;
}
