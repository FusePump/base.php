# Base Class

Base class with magic methods and options set and get.

# Example

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
$foo->getOption('foo.bar', 'baz');

$foo->setUserName('Bobinda'); // magic set method
$foo->getFields(); // array( 'user_name' => 'Bobinda' );
```
