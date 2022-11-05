<?php

declare(strict_types=1);

use VicGutt\PhpEnhancedEnum\Tests\TestSupport\Enums\IsComparable\StatusEnum;
use VicGutt\PhpEnhancedEnum\Tests\TestSupport\Enums\IsComparable\PromiseEnum;
use VicGutt\PhpEnhancedEnum\Tests\TestSupport\Enums\IsComparable\MovementsEnum;

/* UnitEnum
------------------------------------------------*/

test("[UnitEnum | is] - an enum case can check if a given value is equal to itself", function (): void {
    expect(MovementsEnum::ME_TOO->is(MovementsEnum::ME_TOO))->toEqual(true);
    expect(MovementsEnum::ME_TOO->is(MovementsEnum::BLACK_LIVES_MATTER))->toEqual(false);
    expect(MovementsEnum::ME_TOO->is(MovementsEnum::LGBTQ_PLUS))->toEqual(false);
    expect(MovementsEnum::ME_TOO->is(MovementsEnum::AND_MANY_MANY_MORE))->toEqual(false);

    expect(MovementsEnum::ME_TOO->is('ME_TOO'))->toEqual(true);
    expect(MovementsEnum::ME_TOO->is('BLACK_LIVES_MATTER'))->toEqual(false);
    expect(MovementsEnum::ME_TOO->is('LGBTQ_PLUS'))->toEqual(false);
    expect(MovementsEnum::ME_TOO->is('AND_MANY_MANY_MORE'))->toEqual(false);

    expect(MovementsEnum::ME_TOO->is('Me_TOO'))->toEqual(false);
    expect(MovementsEnum::ME_TOO->is('me_too'))->toEqual(false);
    expect(MovementsEnum::ME_TOO->is('yolo'))->toEqual(false);
    expect(MovementsEnum::ME_TOO->is(123))->toEqual(false);

    expect(MovementsEnum::ME_TOO->is(StatusEnum::PENDING))->toEqual(false);
    expect(MovementsEnum::ME_TOO->is(StatusEnum::SUCCEEDED))->toEqual(false);
    expect(MovementsEnum::ME_TOO->is(PromiseEnum::PENDING))->toEqual(false);
    expect(MovementsEnum::ME_TOO->is(PromiseEnum::RESOLVED))->toEqual(false);
});

test("[UnitEnum | isAny] - an enum case can check if any given value is equal to itself", function (): void {
    expect(MovementsEnum::ME_TOO->isAny([MovementsEnum::ME_TOO]))->toEqual(true);
    expect(MovementsEnum::ME_TOO->isAny([MovementsEnum::ME_TOO, MovementsEnum::BLACK_LIVES_MATTER]))->toEqual(true);
    expect(MovementsEnum::ME_TOO->isAny([MovementsEnum::ME_TOO, MovementsEnum::BLACK_LIVES_MATTER, 'BLACK_LIVES_MATTER']))->toEqual(true);
    expect(MovementsEnum::ME_TOO->isAny([
        MovementsEnum::ME_TOO,
        MovementsEnum::BLACK_LIVES_MATTER,
        'BLACK_LIVES_MATTER',
        StatusEnum::PENDING,
    ]))->toEqual(true);

    expect(MovementsEnum::ME_TOO->isAny(['ME_TOO']))->toEqual(true);
    expect(MovementsEnum::ME_TOO->isAny(['ME_TOO', MovementsEnum::BLACK_LIVES_MATTER]))->toEqual(true);
    expect(MovementsEnum::ME_TOO->isAny(['ME_TOO', MovementsEnum::BLACK_LIVES_MATTER, 'BLACK_LIVES_MATTER']))->toEqual(true);
    expect(MovementsEnum::ME_TOO->isAny([
        'ME_TOO',
        MovementsEnum::BLACK_LIVES_MATTER,
        'BLACK_LIVES_MATTER',
        StatusEnum::PENDING,
    ]))->toEqual(true);

    expect(MovementsEnum::ME_TOO->isAny([MovementsEnum::ME_TOO, 'ME_TOO']))->toEqual(true);
    expect(MovementsEnum::ME_TOO->isAny([MovementsEnum::ME_TOO, 'ME_TOO', MovementsEnum::BLACK_LIVES_MATTER]))->toEqual(true);
    expect(MovementsEnum::ME_TOO->isAny([
        MovementsEnum::ME_TOO,
        'ME_TOO',
        MovementsEnum::BLACK_LIVES_MATTER,
        'BLACK_LIVES_MATTER',
    ]))->toEqual(true);
    expect(MovementsEnum::ME_TOO->isAny([
        MovementsEnum::ME_TOO,
        'ME_TOO',
        MovementsEnum::BLACK_LIVES_MATTER,
        'BLACK_LIVES_MATTER',
        StatusEnum::PENDING,
    ]))->toEqual(true);

    expect(MovementsEnum::ME_TOO->isAny([]))->toEqual(false);
    expect(MovementsEnum::ME_TOO->isAny([MovementsEnum::BLACK_LIVES_MATTER]))->toEqual(false);
    expect(MovementsEnum::ME_TOO->isAny(['BLACK_LIVES_MATTER']))->toEqual(false);
    expect(MovementsEnum::ME_TOO->isAny([StatusEnum::PENDING]))->toEqual(false);
    expect(MovementsEnum::ME_TOO->isAny([MovementsEnum::BLACK_LIVES_MATTER, 'BLACK_LIVES_MATTER']))->toEqual(false);
    expect(MovementsEnum::ME_TOO->isAny([
        MovementsEnum::BLACK_LIVES_MATTER,
        'BLACK_LIVES_MATTER',
        StatusEnum::PENDING,
    ]))->toEqual(false);
});

test("[UnitEnum | isAll] - an enum case can check if all given values are equal to itself", function (): void {
    expect(MovementsEnum::ME_TOO->isAll([MovementsEnum::ME_TOO]))->toEqual(true);
    expect(MovementsEnum::ME_TOO->isAll(['ME_TOO']))->toEqual(true);
    expect(MovementsEnum::ME_TOO->isAll([MovementsEnum::ME_TOO, 'ME_TOO']))->toEqual(true);

    expect(MovementsEnum::ME_TOO->isAll([MovementsEnum::ME_TOO, 'ME_TOO', MovementsEnum::BLACK_LIVES_MATTER]))->toEqual(false);
    expect(MovementsEnum::ME_TOO->isAll([MovementsEnum::ME_TOO, 'ME_TOO', 'BLACK_LIVES_MATTER']))->toEqual(false);
    expect(MovementsEnum::ME_TOO->isAll([MovementsEnum::ME_TOO, 'ME_TOO', StatusEnum::PENDING]))->toEqual(false);
});

/* BackedEnum: int
------------------------------------------------*/

test("[BackedEnum: int | is] - an enum case can check if a given value is equal to itself", function (): void {
    expect(PromiseEnum::PENDING->is(PromiseEnum::PENDING))->toEqual(true);
    expect(PromiseEnum::PENDING->is(PromiseEnum::RESOLVED))->toEqual(false);
    expect(PromiseEnum::PENDING->is(PromiseEnum::REJECTED))->toEqual(false);

    expect(PromiseEnum::PENDING->is(1))->toEqual(true);
    expect(PromiseEnum::PENDING->is(2))->toEqual(false);
    expect(PromiseEnum::PENDING->is(3))->toEqual(false);

    expect(PromiseEnum::PENDING->is('1'))->toEqual(false);
    expect(PromiseEnum::PENDING->is('yolo'))->toEqual(false);
    expect(PromiseEnum::PENDING->is(123))->toEqual(false);

    expect(PromiseEnum::PENDING->is(StatusEnum::PENDING))->toEqual(false);
    expect(PromiseEnum::PENDING->is(StatusEnum::SUCCEEDED))->toEqual(false);
    expect(PromiseEnum::PENDING->is(MovementsEnum::ME_TOO))->toEqual(false);
    expect(PromiseEnum::PENDING->is(MovementsEnum::BLACK_LIVES_MATTER))->toEqual(false);
});

test("[BackedEnum: int | isAny] - an enum case can check if any given value is equal to itself", function (): void {
    expect(PromiseEnum::PENDING->isAny([PromiseEnum::PENDING]))->toEqual(true);
    expect(PromiseEnum::PENDING->isAny([PromiseEnum::PENDING, PromiseEnum::RESOLVED]))->toEqual(true);
    expect(PromiseEnum::PENDING->isAny([PromiseEnum::PENDING, PromiseEnum::RESOLVED, 2]))->toEqual(true);
    expect(PromiseEnum::PENDING->isAny([
        PromiseEnum::PENDING,
        PromiseEnum::RESOLVED,
        2,
        StatusEnum::PENDING,
    ]))->toEqual(true);

    expect(PromiseEnum::PENDING->isAny([1]))->toEqual(true);
    expect(PromiseEnum::PENDING->isAny([1, PromiseEnum::RESOLVED]))->toEqual(true);
    expect(PromiseEnum::PENDING->isAny([1, PromiseEnum::RESOLVED, 2]))->toEqual(true);
    expect(PromiseEnum::PENDING->isAny([
        1,
        PromiseEnum::RESOLVED,
        2,
        StatusEnum::PENDING,
    ]))->toEqual(true);

    expect(PromiseEnum::PENDING->isAny([PromiseEnum::PENDING, 1]))->toEqual(true);
    expect(PromiseEnum::PENDING->isAny([PromiseEnum::PENDING, 1, PromiseEnum::RESOLVED]))->toEqual(true);
    expect(PromiseEnum::PENDING->isAny([
        PromiseEnum::PENDING,
        1,
        PromiseEnum::RESOLVED,
        2,
    ]))->toEqual(true);
    expect(PromiseEnum::PENDING->isAny([
        PromiseEnum::PENDING,
        1,
        PromiseEnum::RESOLVED,
        2,
        StatusEnum::PENDING,
    ]))->toEqual(true);

    expect(PromiseEnum::PENDING->isAny([]))->toEqual(false);
    expect(PromiseEnum::PENDING->isAny([PromiseEnum::RESOLVED]))->toEqual(false);
    expect(PromiseEnum::PENDING->isAny([2]))->toEqual(false);
    expect(PromiseEnum::PENDING->isAny([StatusEnum::PENDING]))->toEqual(false);
    expect(PromiseEnum::PENDING->isAny([PromiseEnum::RESOLVED, 2]))->toEqual(false);
    expect(PromiseEnum::PENDING->isAny([
        PromiseEnum::RESOLVED,
        2,
        StatusEnum::PENDING,
    ]))->toEqual(false);
});

test("[BackedEnum: int | isAll] - an enum case can check if all given values are equal to itself", function (): void {
    expect(PromiseEnum::PENDING->isAll([PromiseEnum::PENDING]))->toEqual(true);
    expect(PromiseEnum::PENDING->isAll([1]))->toEqual(true);
    expect(PromiseEnum::PENDING->isAll([PromiseEnum::PENDING, 1]))->toEqual(true);

    expect(PromiseEnum::PENDING->isAll([PromiseEnum::PENDING, 1, PromiseEnum::RESOLVED]))->toEqual(false);
    expect(PromiseEnum::PENDING->isAll([PromiseEnum::PENDING, 1, 2]))->toEqual(false);
    expect(PromiseEnum::PENDING->isAll([PromiseEnum::PENDING, 1, StatusEnum::PENDING]))->toEqual(false);
});

/* BackedEnum: string
------------------------------------------------*/

test("[BackedEnum: string | is] - an enum case can check if a given value is equal to itself", function (): void {
    expect(StatusEnum::PENDING->is(StatusEnum::PENDING))->toEqual(true);
    expect(StatusEnum::PENDING->is(StatusEnum::SUCCEEDED))->toEqual(false);
    expect(StatusEnum::PENDING->is(StatusEnum::FAILED))->toEqual(false);

    expect(StatusEnum::PENDING->is('pending'))->toEqual(true);
    expect(StatusEnum::PENDING->is('succeeded'))->toEqual(false);
    expect(StatusEnum::PENDING->is('failed'))->toEqual(false);

    expect(StatusEnum::PENDING->is('PENDING'))->toEqual(false);
    expect(StatusEnum::PENDING->is('Pending'))->toEqual(false);
    expect(StatusEnum::PENDING->is('yolo'))->toEqual(false);
    expect(StatusEnum::PENDING->is(123))->toEqual(false);

    expect(StatusEnum::PENDING->is(PromiseEnum::PENDING))->toEqual(false);
    expect(StatusEnum::PENDING->is(PromiseEnum::RESOLVED))->toEqual(false);
    expect(StatusEnum::PENDING->is(MovementsEnum::ME_TOO))->toEqual(false);
    expect(StatusEnum::PENDING->is(MovementsEnum::BLACK_LIVES_MATTER))->toEqual(false);
});

test("[BackedEnum: string | isAny] - an enum case can check if any given value is equal to itself", function (): void {
    expect(StatusEnum::PENDING->isAny([StatusEnum::PENDING]))->toEqual(true);
    expect(StatusEnum::PENDING->isAny([StatusEnum::PENDING, StatusEnum::SUCCEEDED]))->toEqual(true);
    expect(StatusEnum::PENDING->isAny([StatusEnum::PENDING, StatusEnum::SUCCEEDED, 'succeeded']))->toEqual(true);
    expect(StatusEnum::PENDING->isAny([
        StatusEnum::PENDING,
        StatusEnum::SUCCEEDED,
        'succeeded',
        PromiseEnum::PENDING,
    ]))->toEqual(true);

    expect(StatusEnum::PENDING->isAny(['pending']))->toEqual(true);
    expect(StatusEnum::PENDING->isAny(['pending', StatusEnum::SUCCEEDED]))->toEqual(true);
    expect(StatusEnum::PENDING->isAny(['pending', StatusEnum::SUCCEEDED, 'succeeded']))->toEqual(true);
    expect(StatusEnum::PENDING->isAny([
        'pending',
        StatusEnum::SUCCEEDED,
        'succeeded',
        PromiseEnum::PENDING,
    ]))->toEqual(true);

    expect(StatusEnum::PENDING->isAny([StatusEnum::PENDING, 'pending']))->toEqual(true);
    expect(StatusEnum::PENDING->isAny([StatusEnum::PENDING, 'pending', StatusEnum::SUCCEEDED]))->toEqual(true);
    expect(StatusEnum::PENDING->isAny([
        StatusEnum::PENDING,
        'pending',
        StatusEnum::SUCCEEDED,
        'succeeded',
    ]))->toEqual(true);
    expect(StatusEnum::PENDING->isAny([
        StatusEnum::PENDING,
        'pending',
        StatusEnum::SUCCEEDED,
        'succeeded',
        PromiseEnum::PENDING,
    ]))->toEqual(true);

    expect(StatusEnum::PENDING->isAny([]))->toEqual(false);
    expect(StatusEnum::PENDING->isAny([StatusEnum::SUCCEEDED]))->toEqual(false);
    expect(StatusEnum::PENDING->isAny(['succeeded']))->toEqual(false);
    expect(StatusEnum::PENDING->isAny([PromiseEnum::PENDING]))->toEqual(false);
    expect(StatusEnum::PENDING->isAny([StatusEnum::SUCCEEDED, 'succeeded']))->toEqual(false);
    expect(StatusEnum::PENDING->isAny([
        StatusEnum::SUCCEEDED,
        'succeeded',
        PromiseEnum::PENDING,
    ]))->toEqual(false);
});

test("[BackedEnum: string | isAll] - an enum case can check if all given values are equal to itself", function (): void {
    expect(StatusEnum::PENDING->isAll([StatusEnum::PENDING]))->toEqual(true);
    expect(StatusEnum::PENDING->isAll(['pending']))->toEqual(true);
    expect(StatusEnum::PENDING->isAll([StatusEnum::PENDING, 'pending']))->toEqual(true);

    expect(StatusEnum::PENDING->isAll([StatusEnum::PENDING, 'pending', StatusEnum::SUCCEEDED]))->toEqual(false);
    expect(StatusEnum::PENDING->isAll([StatusEnum::PENDING, 'pending', 'succeeded']))->toEqual(false);
    expect(StatusEnum::PENDING->isAll([StatusEnum::PENDING, 'pending', PromiseEnum::PENDING]))->toEqual(false);
});
