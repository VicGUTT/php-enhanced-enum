<?php

declare(strict_types=1);

namespace VicGutt\PhpEnhancedEnum\Tests\TestSupport\Enums\IsComparable;

use VicGutt\PhpEnhancedEnum\Concerns\IsComparable;
use VicGutt\PhpEnhancedEnum\Contracts\IsComparableContract;

enum MovementsEnum implements IsComparableContract
{
    use IsComparable;

    case ME_TOO;
    case BLACK_LIVES_MATTER;
    case LGBTQ_PLUS;
    case AND_MANY_MANY_MORE;
}
