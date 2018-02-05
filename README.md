# byname

[![Latest Version on Packagist][ico-version]][link-packagist]
[![Software License][ico-license]](LICENSE.md)
[![Build Status][ico-travis]][link-travis]
[![Coverage Status][ico-scrutinizer]][link-scrutinizer]
[![Quality Score][ico-code-quality]][link-code-quality]
[![Total Downloads][ico-downloads]][link-downloads]

PHP trait for bynaming (nicknaming) classes/objects.

## Install

Via Composer

``` bash
$ composer require gregoriohc/byname
```

## Usage

By default, the class byname is the class basename (without namespace).

``` php
class MyClass {
    use HasByname;
}

echo MyClass::byname();
// MyClass
```

### Removing prefix and/or suffix

You can remove some characters from the beginning (prefix) or the end (suffix) of the byname overriding the `bynamePrefix` and `bynameSuffix` methods and returning the string to remove or the number of characters.

``` php
class MyClass {
    use HasByname;
    protected static function bynamePrefix()
    {
        return 'My';
    }
}

echo MyClass::byname();
// Class
```

``` php
class MyClass {
    use HasByname;
    protected static function bynameSuffix()
    {
        return 5;
    }
}

echo MyClass::byname();
// My
```

A more complex example, mixing this with inheritance:

``` php
abstract class BaseController {
    use HasByname;
    protected static function bynameSuffix()
    {
        return 'Controller';
    }
    public function model()
    {
        $class = '\\App\\' . $this->byname();
        return new $class();
    }
}

class UserController extends BaseController {
    ...
}

echo UserController::byname();
// User

$user = (new UserController)->model();
print_r($user);
// App\User Object (...)
```

### Custom byname

You can set a custom byname overriding the `bynameValue` method.

``` php
class MyClass {
    use HasByname;
    protected static function bynameValue()
    {
        return 'Cool';
    }
}

echo MyClass::byname();
// Cool
```

### Case

Yu can also get the name in three diferent cases:

``` php
class MyClass {
    use HasByname;
}

echo MyClass::bynameSnake();
// my_class
echo MyClass::bynameCamel();
// myClass
echo MyClass::bynameStudly();
// MyClass
```

## Testing

``` bash
$ composer test
```

## Change log

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

### Security

If you discover any security related issues, please email gregoriohc@gmail.com instead of using the issue tracker.

## Socialware

You're free to use this package, but if it makes it to your production environment I highly appreciate you sharing it on any social network.

## Credits

- [Gregorio Hernández Caso][link-author]
- [All Contributors][link-contributors]

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.

[ico-version]: https://img.shields.io/packagist/v/gregoriohc/byname.svg?style=flat-square
[ico-license]: https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square
[ico-travis]: https://img.shields.io/travis/gregoriohc/byname/master.svg?style=flat-square
[ico-scrutinizer]: https://img.shields.io/scrutinizer/coverage/g/gregoriohc/byname.svg?style=flat-square
[ico-code-quality]: https://img.shields.io/scrutinizer/g/gregoriohc/byname.svg?style=flat-square
[ico-downloads]: https://img.shields.io/packagist/dt/gregoriohc/byname.svg?style=flat-square

[link-packagist]: https://packagist.org/packages/gregoriohc/byname
[link-travis]: https://travis-ci.org/gregoriohc/byname
[link-scrutinizer]: https://scrutinizer-ci.com/g/gregoriohc/byname/code-structure
[link-code-quality]: https://scrutinizer-ci.com/g/gregoriohc/byname
[link-downloads]: https://packagist.org/packages/gregoriohc/byname
[link-author]: https://github.com/gregoriohc
[link-contributors]: ../../contributors
