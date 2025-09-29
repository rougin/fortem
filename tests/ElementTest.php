<?php

namespace Rougin\Fortem;

/**
 * @package Fortem
 *
 * @author Rougin Gutib <rougingutib@gmail.com>
 */
class ElementTest extends Testcase
{
    /**
     * @return void
     */
    public function test_disables_on()
    {
        $element = new Element;

        $element->disablesOn('loading');

        $reflection = new \ReflectionClass($element);
        $property = $reflection->getProperty('attrs');

        $property->setAccessible(true);

        /** @var array<string, mixed> $attrs */
        $attrs = $property->getValue($element);

        $expect = 'loading';

        $actual = $attrs[':disabled'];

        $this->assertArrayHasKey(':disabled', $attrs);
        $this->assertEquals($expect, $actual);
    }

    /**
     * @return void
     */
    public function test_with()
    {
        $element = new Element;

        $element->with('data-test', 'value');

        $reflection = new \ReflectionClass($element);
        $property = $reflection->getProperty('attrs');

        $property->setAccessible(true);

        /** @var array<string, mixed> $attrs */
        $attrs = $property->getValue($element);

        $expect = 'value';

        $actual = $attrs['data-test'];

        $this->assertArrayHasKey('data-test', $attrs);
        $this->assertEquals($expect, $actual);
    }

    /**
     * @return void
     */
    public function test_with_class()
    {
        $element = new Element;

        $element->withClass('my-class');

        $reflection = new \ReflectionClass($element);
        $property = $reflection->getProperty('attrs');

        $property->setAccessible(true);

        /** @var array<string, mixed> $attrs */
        $attrs = $property->getValue($element);

        $expect = 'my-class';

        $actual = $attrs['class'];

        $this->assertArrayHasKey('class', $attrs);
        $this->assertEquals($expect, $actual);
    }

    /**
     * @return void
     */
    public function test_with_id()
    {
        $element = new Element;

        $element->withId('my-id');

        $reflection = new \ReflectionClass($element);
        $property = $reflection->getProperty('attrs');

        $property->setAccessible(true);

        /** @var array<string, mixed> $attrs */
        $attrs = $property->getValue($element);

        $expect = 'my-id';

        $actual = $attrs['id'];

        $this->assertArrayHasKey('id', $attrs);
        $this->assertEquals($expect, $actual);
    }
}
