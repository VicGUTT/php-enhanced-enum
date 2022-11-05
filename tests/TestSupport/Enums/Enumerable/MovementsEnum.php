<?php

declare(strict_types=1);

namespace VicGutt\PhpEnhancedEnum\Tests\TestSupport\Enums\Enumerable;

use VicGutt\PhpEnhancedEnum\Concerns\Enumerable;
use VicGutt\PhpEnhancedEnum\Contracts\EnumerableContract;

enum MovementsEnum implements EnumerableContract
{
    use Enumerable;

    case ME_TOO;
    case BLACK_LIVES_MATTER;
    case LGBTQ_PLUS;
    case AND_MANY_MANY_MORE;
}
