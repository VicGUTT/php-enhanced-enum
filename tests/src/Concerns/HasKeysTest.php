<?php

declare(strict_types=1);

use VicGutt\PhpEnhancedEnum\Tests\TestSupport\Enums\HasKeys\StatusEnum;
use VicGutt\PhpEnhancedEnum\Tests\TestSupport\Enums\HasKeys\PromiseEnum;
use VicGutt\PhpEnhancedEnum\Tests\TestSupport\Enums\HasKeys\MovementsEnum;

test("[UnitEnum] - an enum can retrieve it's case names", function (): void {
    expect(MovementsEnum::keys())->toEqual([
        'ME_TOO',
        'BLACK_LIVES_MATTER',
        'LGBTQ_PLUS',
        'AND_MANY_MANY_MORE',
    ]);
});

test("[BackedEnum: int] - an enum can retrieve it's case names", function (): void {
    expect(PromiseEnum::keys())->toEqual([
        'PENDING',
        'RESOLVED',
        'REJECTED',
    ]);
});

test("[BackedEnum: string] - an enum can retrieve it's case names", function (): void {
    expect(StatusEnum::keys())->toEqual([
        'PENDING',
        'SUCCEEDED',
        'FAILED',
    ]);
});
