<?php

declare(strict_types=1);

namespace VicGutt\PhpEnhancedEnum\Tests\TestSupport\Enums\HasEntries;

use VicGutt\PhpEnhancedEnum\Concerns\HasEntries;
use VicGutt\PhpEnhancedEnum\Contracts\HasEntriesContract;

enum MovementsEnum implements HasEntriesContract
{
    use HasEntries;

    case ME_TOO;
    case BLACK_LIVES_MATTER;
    case LGBTQ_PLUS;
    case AND_MANY_MANY_MORE;
}
