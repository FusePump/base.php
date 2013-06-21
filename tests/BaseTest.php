<?php
/**
 * Base class test
 *
 * @author Jonathan Kim <jonathan.kim@fusepump.com>
 */
require_once __DIR__.'/../src/FusePump/Base/Base.php';
use \FusePump\Base\Base as Base;

/**
 * Base class test
 *
 * @author Jonathan Kim <jonathan.kim@fusepump.com>
 */
class BaseTest extends PHPUnit_Framework_TestCase
{
    /**
     * Get option
     *
     * @return void
     */
    public function testGetOption()
    {
        $base = new Base(
            array(),
            array(
                'foo' => array(
                    'bar' => 'baz'
                )
            )
        );

        $this->assertEquals($base->getOption('foo.bar'), 'baz');
    }

    /**
     * Options not array exception
     *
     * @return void
     */
    public function testGetOptionNotArray()
    {
        $base = new Base();

        $this->setExpectedException(
            'Exception', 'Options is not an array'
        );

        $base->getOption('foo.bar', 'not_array');
    }

    /**
     * Get option that is not set
     *
     * @return void
     */
    public function testGetOptionNotSet()
    {
        $base = new Base();

        $this->setExpectedException(
            'Exception', 'Option "foo" has not been set'
        );

        $base->getOption('foo.bar');
    }

    /**
     * Set option
     *
     * @return void
     */
    public function testSetOption()
    {
        $base = new Base();

        $base->setOption('foo.bar', 'baz');

        $this->assertEquals($base->getOption('foo.bar'), 'baz');
    }

    /**
     * Options not array exception
     *
     * @return void
     */
    public function testSetOptionNotArray()
    {
        $base = new Base();

        $this->setExpectedException(
            'Exception', 'Options is not an array'
        );

        $base->setOption('foo.bar', 'baz', 'not_array');
    }

    /**
     * Set fields
     *
     * @return void
     */
    public function testSetFields()
    {
        $base = new Base();

        $fields = array(
            'foo' => 'bar'
        );

        $base->setFields($fields);

        $this->assertEquals($base->getFields(), $fields);
    }

    /**
     * Set fields array exception
     *
     * @return void
     */
    public function testSetFieldsArrayException()
    {
        $base = new Base();

        $this->setExpectedException(
            'Exception', 'Fields is not an array'
        );

        $base->setFields('not_array');
    }

    /**
     * Magic get
     *
     * @return void
     */
    public function testMagicGet()
    {
        $base = new Base();

        $base->setFields(
            array(
                'foo' => 'bar'
            )
        );

        $this->assertEquals(
            $base->getFoo(),
            'bar'
        );
    }

    /**
     * Magic get exception
     *
     * @return void
     */
    public function testMagicGetException()
    {
        $base = new Base();

        $this->setExpectedException(
            'Exception', 'The requested option: "foo" does not exist'
        );

        $base->getFoo();
    }

    /**
     * Magic set field
     *
     * @return void
     */
    public function testMagicSet()
    {
        $base = new Base();

        $base->setFoo('bar');

        $this->assertEquals(
            $base->getFields(),
            $fields = array(
                'foo' => 'bar'
            )
        );
    }

    /**
     * Magic method unknown verb exception
     *
     * @return void
     */
    public function testMagicUnknownVerbException()
    {
        $base = new Base();

        $this->setExpectedException(
            'Exception', 'The requested verb: "foo" is not valid'
        );

        $base->fooBar();
    }

    /**
     * Test camel case
     *
     * @return void
     */
    public function testCamelCase()
    {
        $base = new Base(
            array(
                'foo_bar' => 'baz'
            )
        );

        $this->assertEquals($base->getFooBar(), 'baz');
    }
}
