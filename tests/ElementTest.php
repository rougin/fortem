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
    public function test_failed_if_without_alpine()
    {
        $this->doExpectException('Exception');

        $el = new Element;

        $el->disablesOn('loading');
    }

    /**
     * @return void
     */
    public function test_passed_if_disables_on()
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
    public function test_passed_if_no_styling()
    {
        $expect = '';

        $el = new Element;

        $el->noStyling();

        $actual = $el->getAttrs();

        $this->assertEquals($expect, $actual);
    }

    /**
     * @return void
     */
    public function test_passed_if_no_styling_class()
    {
        $expect = 'class="my-class"';

        $el = new Element;

        $el->noStyling()->withClass('my-class');

        $actual = $el->getAttrs();

        $this->assertEquals($expect, $actual);
    }

    /**
     * @return void
     */
    public function test_passed_if_with_class()
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
    public function test_passed_if_with_custom_attr()
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
    public function test_passed_if_with_id()
    {
        $expect = 'id="my-id"';

        $el = new Element;

        $el->withId('my-id');

        $actual = $el->getAttrs();

        $this->assertEquals($expect, $actual);
    }
}
