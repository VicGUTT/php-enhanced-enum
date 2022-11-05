<?php

declare(strict_types=1);

use VicGutt\PhpEnhancedEnum\Concerns\HasKeys;
use VicGutt\PhpEnhancedEnum\Concerns\HasValues;
use VicGutt\PhpEnhancedEnum\Concerns\Enumerable;
use VicGutt\PhpEnhancedEnum\Concerns\HasEntries;
use VicGutt\PhpEnhancedEnum\Concerns\IsComparable;

it('uses all the necessary traits', function (): void {
    expect(class_uses(Enumerable::class))->toEqual([
        HasKeys::class => HasKeys::class,
        HasValues::class => HasValues::class,
        HasEntries::class => HasEntries::class,
        IsComparable::class => IsComparable::class,
    ]);
});
