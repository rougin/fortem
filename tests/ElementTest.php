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
        $expect = ':disabled="loading"';

        $el = new Element;

        $el->withAlpine();

        $el->disablesOn('loading');

        $actual = $el->getAttrs();

        $this->assertEquals($expect, $actual);
    }

    /**
     * @return void
     */
    public function test_with_class()
    {
        $expect = 'class="my-class"';

        $el = new Element;

        $el->withClass('my-class');

        $actual = $el->getAttrs();

        $this->assertEquals($expect, $actual);
    }

    /**
     * @return void
     */
    public function test_with_custom_attr()
    {
        $expect = 'data-test="value"';

        $el = new Element;

        $el->with('data-test', 'value');

        $actual = $el->getAttrs();

        $this->assertEquals($expect, $actual);
    }

    /**
     * @return void
     */
    public function test_with_id()
    {
        $expect = 'id="my-id"';

        $el = new Element;

        $el->withId('my-id');

        $actual = $el->getAttrs();

        $this->assertEquals($expect, $actual);
    }

    /**
     * @return void
     */
    public function test_without_alpine()
    {
        $this->doExpectException('Exception');

        $el = new Element;

        $el->disablesOn('loading');
    }
}
