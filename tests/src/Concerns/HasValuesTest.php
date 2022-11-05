<?php

declare(strict_types=1);

use VicGutt\PhpEnhancedEnum\Tests\TestSupport\Enums\HasValues\StatusEnum;
use VicGutt\PhpEnhancedEnum\Tests\TestSupport\Enums\HasValues\PromiseEnum;
use VicGutt\PhpEnhancedEnum\Tests\TestSupport\Enums\HasValues\MovementsEnum;

test("[UnitEnum] - an unit enum can retrieve it's case values", function (): void {
    expect(MovementsEnum::values())->toEqual([
        'ME_TOO',
        'BLACK_LIVES_MATTER',
        'LGBTQ_PLUS',
        'AND_MANY_MANY_MORE',
    ]);
});

test("[UnitEnum] - unit enum values are exacly the same as it's keys", function (): void {
    expect(MovementsEnum::values())->toEqual(
        array_map(static fn (UnitEnum $case): string => $case->name, MovementsEnum::cases()),
    );
});
// test("[UnitEnum] - it throws a TypeError", function (): void {
//     expect(fn () => MovementsEnum::values())->toThrow(
//         TypeError::class,
//         'Argument #1 ($case) must be of type BackedEnum, VicGutt\PhpEnhancedEnum\Tests\TestSupport\Enums\HasValues\MovementsEnum given'
//     );
// });

test("[BackedEnum: int] - an enum can retrieve it's case values", function (): void {
    expect(PromiseEnum::values())->toEqual([1, 2, 3]);
});

test("[BackedEnum: string] - an enum can retrieve it's case values", function (): void {
    expect(StatusEnum::values())->toEqual([
        'pending',
        'succeeded',
        'failed',
    ]);
});
