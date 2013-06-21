# Base Class

Base class with magic methods and options set and get.

[![Build Status](https://travis-ci.org/FusePump/base.php.png?branch=master)](https://travis-ci.org/FusePump/base.php)

## Installation

Add this to your `composer.json`

```
{
    "require": {
        "fusepump/base.php": "0.1.*"
    }
}
```

Then run:

    composer install

And finally add `require 'vendor/autoload.php'` to your php file;

## Example

```php
class Foo extends \FusePump\Base\Base
{
    public function __construct()
    {
        parent::__construct(
            // Fields
            array(
                'user_id' => 'bob'
            ),
            
            // Options
            array(
                'foo' => array(
                    'bar' => 'baz'
                )
            )
        );
    }
}

$foo = new Foo();
$foo->getUserId(); // bob
$foo->getOption('foo.bar'); // 'baz'

$foo->setUserName('Bobinda'); // magic set method
$foo->getFields(); // array( 'user_name' => 'Bobinda' );
```

## License

MIT
