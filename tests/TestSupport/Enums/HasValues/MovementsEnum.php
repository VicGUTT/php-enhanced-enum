<?php

declare(strict_types=1);

namespace VicGutt\PhpEnhancedEnum\Tests\TestSupport\Enums\HasValues;

use VicGutt\PhpEnhancedEnum\Concerns\HasValues;
use VicGutt\PhpEnhancedEnum\Contracts\HasValuesContract;

enum MovementsEnum implements HasValuesContract
{
    use HasValues;

    case ME_TOO;
    case BLACK_LIVES_MATTER;
    case LGBTQ_PLUS;
    case AND_MANY_MANY_MORE;
}
