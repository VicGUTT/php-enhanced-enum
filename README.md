# Enhances PHP's native enums with convenient methods

[![GitHub Tests Action Status](https://github.com/vicgutt/php-enhanced-enum/actions/workflows/run-tests.yml/badge.svg)](https://github.com/vicgutt/php-enhanced-enum/actions/workflows/run-tests.yml)
[![GitHub PHPStan Action Status](https://github.com/vicgutt/php-enhanced-enum/actions/workflows/phpstan.yml/badge.svg)](https://github.com/vicgutt/php-enhanced-enum/actions/workflows/phpstan.yml)
[![GitHub Code Style Action Status](https://github.com/vicgutt/php-enhanced-enum/actions/workflows/fix-php-code-style-issues.yml/badge.svg)](https://github.com/vicgutt/php-enhanced-enum/actions/workflows/fix-php-code-style-issues.yml)
[![Latest Version on Packagist](https://img.shields.io/packagist/v/vicgutt/php-enhanced-enum.svg?style=flat-square)](https://packagist.org/packages/vicgutt/php-enhanced-enum)
[![Total Downloads](https://img.shields.io/packagist/dt/vicgutt/php-enhanced-enum.svg?style=flat-square)](https://packagist.org/packages/vicgutt/php-enhanced-enum)

---

This package provides you with convenient and single purposed traits and interfaces that aims to independently enhance native PHP enums.

The provided traits are:
- [VicGutt\PhpEnhancedEnum\Concerns\\`HasKeys`](/src/Concerns/HasKeys.php)
- [VicGutt\PhpEnhancedEnum\Concerns\\`HasValues`](/src/Concerns/HasValues.php)
- [VicGutt\PhpEnhancedEnum\Concerns\\`HasEntries`](/src/Concerns/HasEntries.php)
- [VicGutt\PhpEnhancedEnum\Concerns\\`IsComparable`](/src/Concerns/IsComparable.php)
- [VicGutt\PhpEnhancedEnum\Concerns\\`Enumerable`](/src/Concerns/Enumerable.php)

The provided interfaces are:
- [VicGutt\PhpEnhancedEnum\Contracts\\`HasKeysContract`](/src/Contracts/HasKeysContract.php)
- [VicGutt\PhpEnhancedEnum\Contracts\\`HasValuesContract`](/src/Contracts/HasValuesContract.php)
- [VicGutt\PhpEnhancedEnum\Contracts\\`HasEntriesContract`](/src/Contracts/HasEntriesContract.php)
- [VicGutt\PhpEnhancedEnum\Contracts\\`IsComparableContract`](/src/Contracts/IsComparableContract.php)
- [VicGutt\PhpEnhancedEnum\Contracts\\`EnumerableContract`](/src/Contracts/EnumerableContract.php)

**Note**: The `Enumerable` trait is a compound of all the available traits and similarly, the `EnumerableContract` interface extends all the other interfaces.


## Installation

You can install the package via composer:

```bash
composer require vicgutt/php-enhanced-enum
```

## Usage

As the package only provides you with traits and interfaces to enhance your enums, you will need to make use of the given trait/interface pair for each of your enums.

Example:

```php
use VicGutt\PhpEnhancedEnum\Concerns\Enumerable;
use VicGutt\PhpEnhancedEnum\Contracts\EnumerableContract;

enum MyEnum: string implements EnumerableContract
{
    use Enumerable;
    
    case CASE1 = 'case1';
    case CASE2 = 'case2';
}
```

From there, you will be able to use any of the provided additional methods.

## Traits, interfaces and available methods

We will be using the following example enums throughout this documentation:

```php
use VicGutt\PhpEnhancedEnum\Concerns\Enumerable;
use VicGutt\PhpEnhancedEnum\Contracts\EnumerableContract;

/**
 * A "unit enum"
 */
enum MovementsEnum implements EnumerableContract
{
    use Enumerable;

    case ME_TOO;
    case BLACK_LIVES_MATTER;
    case LGBTQ_PLUS;
    case AND_MANY_MANY_MORE;
}

/**
 * An integer typed "backed enum"
 */
enum PromiseEnum: int implements EnumerableContract
{
    use Enumerable;

    case PENDING = 1;
    case RESOLVED = 2;
    case REJECTED = 3;
}

/**
 * A string typed "backed enum"
 */
enum StatusEnum: string implements EnumerableContract
{
    use Enumerable;

    case PENDING = 'pending';
    case SUCCEEDED = 'succeeded';
    case FAILED = 'failed';
}
```

**Note**: The example enums above could each choose to make use of one, all or any of the provided traits and interfaces individually.

### HasKeys

Retrieve the enum's case names.

Example:

```php
MovementsEnum::keys(); // ['ME_TOO', 'BLACK_LIVES_MATTER', 'LGBTQ_PLUS', 'AND_MANY_MANY_MORE']
PromiseEnum::keys(); // ['PENDING', 'RESOLVED', 'REJECTED']
StatusEnum::keys(); // ['PENDING', 'SUCCEEDED', 'FAILED']
```

### HasValues

Retrieve the enum's case values.

Example:

```php
MovementsEnum::values(); // ['ME_TOO', 'BLACK_LIVES_MATTER', 'LGBTQ_PLUS', 'AND_MANY_MANY_MORE']
PromiseEnum::values(); // [1, 2, 3]
StatusEnum::values(); // ['pending', 'succeeded', 'failed']
```

**Note**: For "unit enum"s, as they don't technically have values, the `HasValues` trait will use the enum's keys as values. Thefore, the values will always be the same as the keys.

### HasEntries

Retrieve the enum's keys and values.

Example:

```php
MovementsEnum::entries(); // ['ME_TOO' => 'ME_TOO', 'BLACK_LIVES_MATTER' => 'BLACK_LIVES_MATTER', 'LGBTQ_PLUS' => 'LGBTQ_PLUS', 'AND_MANY_MANY_MORE' => 'AND_MANY_MANY_MORE']
PromiseEnum::entries(); // ['PENDING' => 1, 'RESOLVED' => 2, 'REJECTED' => 3]
StatusEnum::entries(); // ['PENDING' => 'pending', 'SUCCEEDED' => 'succeeded', 'FAILED' => 'failed']
```

**Note**: For "unit enum"s, as they don't technically have values, the `HasEntries` trait will use the enum's keys as values. Thefore, the values will always be the same as the keys.

### IsComparable::is

Checks if a given value is equal to itself.

Example:

```php
MovementsEnum::ME_TOO->is(MovementsEnum::ME_TOO); // true
MovementsEnum::ME_TOO->is(MovementsEnum::BLACK_LIVES_MATTER); // false
MovementsEnum::ME_TOO->is('ME_TOO'); // true
MovementsEnum::ME_TOO->is('Me_TOO'); // false
MovementsEnum::ME_TOO->is(123); // false

PromiseEnum::PENDING->is(PromiseEnum::PENDING); // true
PromiseEnum::PENDING->is(StatusEnum::PENDING); // false
PromiseEnum::PENDING->is(1); // true
PromiseEnum::PENDING->is('1'); // false
PromiseEnum::PENDING->is('yolo'); // false

StatusEnum::PENDING->is(StatusEnum::PENDING); // true
StatusEnum::PENDING->is(PromiseEnum::PENDING); // false
StatusEnum::PENDING->is('pending'); // true
StatusEnum::PENDING->is('PENDING'); // false
StatusEnum::PENDING->is(123); // false
```

### IsComparable::isAny

Checks if any of the given values are equal to itself.

Example:

```php
MovementsEnum::ME_TOO->isAny([MovementsEnum::ME_TOO]); // true
MovementsEnum::ME_TOO->isAny([MovementsEnum::ME_TOO, MovementsEnum::BLACK_LIVES_MATTER]); // true
MovementsEnum::ME_TOO->isAny(['ME_TOO', MovementsEnum::BLACK_LIVES_MATTER]); // true
MovementsEnum::ME_TOO->isAny(MovementsEnum::BLACK_LIVES_MATTER, 'Me_TOO', 123]); // false

PromiseEnum::PENDING->isAny([PromiseEnum::PENDING]); // true
PromiseEnum::PENDING->isAny([PromiseEnum::PENDING, MovementsEnum::BLACK_LIVES_MATTER]); // true
PromiseEnum::PENDING->isAny([1, MovementsEnum::BLACK_LIVES_MATTER]); // true
PromiseEnum::PENDING->isAny(MovementsEnum::BLACK_LIVES_MATTER, 'PENDING', 123]); // false

StatusEnum::PENDING->isAny([StatusEnum::PENDING]); // true
StatusEnum::PENDING->isAny([StatusEnum::PENDING, MovementsEnum::BLACK_LIVES_MATTER]); // true
StatusEnum::PENDING->isAny(['pending', MovementsEnum::BLACK_LIVES_MATTER]); // true
StatusEnum::PENDING->isAny(MovementsEnum::BLACK_LIVES_MATTER, 'PENDING', 123]); // false
```

### IsComparable::isAll

Checks if all of the given values are equal to itself.

Example:

```php
MovementsEnum::ME_TOO->isAll([MovementsEnum::ME_TOO]); // true
MovementsEnum::ME_TOO->isAll([MovementsEnum::ME_TOO, 'ME_TOO']); // true
MovementsEnum::ME_TOO->isAll([MovementsEnum::ME_TOO, 'ME_TOO', MovementsEnum::BLACK_LIVES_MATTER]); // false

PromiseEnum::PENDING->isAll([PromiseEnum::PENDING]); // true
PromiseEnum::PENDING->isAll([PromiseEnum::PENDING, 1]); // true
PromiseEnum::PENDING->isAll([PromiseEnum::PENDING, 1, MovementsEnum::BLACK_LIVES_MATTER]); // false

StatusEnum::PENDING->isAll([StatusEnum::PENDING]); // true
StatusEnum::PENDING->isAll([StatusEnum::PENDING, 'pending']); // true
StatusEnum::PENDING->isAll([StatusEnum::PENDING, 'pending', MovementsEnum::BLACK_LIVES_MATTER]); // false
```

## Testing

```bash
composer test
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

If you're interested in contributing to the project, please read our [contributing docs](https://github.com/vicgutt/php-enhanced-enum/blob/main/.github/CONTRIBUTING.md) **before submitting a pull request**.

## Security Vulnerabilities

Please review [our security policy](../../security/policy) on how to report security vulnerabilities.

## Credits

-   [Victor GUTT](https://github.com/vicgutt)
-   [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE) for more information.
