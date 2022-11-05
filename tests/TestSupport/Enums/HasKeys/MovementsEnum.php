<?php

declare(strict_types=1);

namespace VicGutt\PhpEnhancedEnum\Tests\TestSupport\Enums\HasKeys;

use VicGutt\PhpEnhancedEnum\Concerns\HasKeys;
use VicGutt\PhpEnhancedEnum\Contracts\HasKeysContract;

enum MovementsEnum implements HasKeysContract
{
    use HasKeys;

    case ME_TOO;
    case BLACK_LIVES_MATTER;
    case LGBTQ_PLUS;
    case AND_MANY_MANY_MORE;
}
