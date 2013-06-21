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
}
