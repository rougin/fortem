<?php

namespace Rougin\Fortem;

class ElementTest extends Testcase
{
    /**
     * Tests Element->disablesOn().
     *
     * @return void
     */
    public function testDisablesOn()
    {
        $element = new Element;
        $element->disablesOn('loading');

        $reflection = new \ReflectionClass($element);
        $property = $reflection->getProperty('attrs');
        $property->setAccessible(true);
        /** @var array<string, mixed> $attrs */
        $attrs = $property->getValue($element);

        $this->assertArrayHasKey(':disabled', $attrs);
        $this->assertEquals('loading', $attrs[':disabled']);
    }

    /**
     * Tests Element->with().
     *
     * @return void
     */
    public function testWith()
    {
        $element = new Element;
        $element->with('data-test', 'value');

        $reflection = new \ReflectionClass($element);
        $property = $reflection->getProperty('attrs');
        $property->setAccessible(true);
        /** @var array<string, mixed> $attrs */
        $attrs = $property->getValue($element);

        $this->assertArrayHasKey('data-test', $attrs);
        $this->assertEquals('value', $attrs['data-test']);
    }

    /**
     * Tests Element->withClass().
     *
     * @return void
     */
    public function testWithClass()
    {
        $element = new Element;
        $element->withClass('my-class');

        $reflection = new \ReflectionClass($element);
        $property = $reflection->getProperty('attrs');
        $property->setAccessible(true);
        /** @var array<string, mixed> $attrs */
        $attrs = $property->getValue($element);

        $this->assertArrayHasKey('class', $attrs);
        $this->assertEquals('my-class', $attrs['class']);
    }

    /**
     * Tests Element->withId().
     *
     * @return void
     */
    public function testWithId()
    {
        $element = new Element;
        $element->withId('my-id');

        $reflection = new \ReflectionClass($element);
        $property = $reflection->getProperty('attrs');
        $property->setAccessible(true);
        /** @var array<string, mixed> $attrs */
        $attrs = $property->getValue($element);

        $this->assertArrayHasKey('id', $attrs);
        $this->assertEquals('my-id', $attrs['id']);
    }
}
