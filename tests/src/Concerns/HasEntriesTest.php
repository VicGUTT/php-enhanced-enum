<?php

declare(strict_types=1);

use VicGutt\PhpEnhancedEnum\Tests\TestSupport\Enums\HasEntries\StatusEnum;
use VicGutt\PhpEnhancedEnum\Tests\TestSupport\Enums\HasEntries\PromiseEnum;
use VicGutt\PhpEnhancedEnum\Tests\TestSupport\Enums\HasEntries\MovementsEnum;

test("[UnitEnum] - an enum can retrieve it's case entries", function (): void {
    expect(MovementsEnum::entries())->toEqual([
        'ME_TOO' => 'ME_TOO',
        'BLACK_LIVES_MATTER' => 'BLACK_LIVES_MATTER',
        'LGBTQ_PLUS' => 'LGBTQ_PLUS',
        'AND_MANY_MANY_MORE' => 'AND_MANY_MANY_MORE',
    ]);
});

test("[BackedEnum: int] - an enum can retrieve it's case entries", function (): void {
    expect(PromiseEnum::entries())->toEqual([
        'PENDING' => 1,
        'RESOLVED' => 2,
        'REJECTED' => 3,
    ]);
});

test("[BackedEnum: string] - an enum can retrieve it's case entries", function (): void {
    expect(StatusEnum::entries())->toEqual([
        'PENDING' => 'pending',
        'SUCCEEDED' => 'succeeded',
        'FAILED' => 'failed',
    ]);
});
