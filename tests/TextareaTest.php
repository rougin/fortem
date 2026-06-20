<?php

namespace Rougin\Fortem;

use Rougin\Fortem\Fixture\CustomStyle;

/**
 * @package Fortem
 *
 * @author Rougin Gutib <rougingutib@gmail.com>
 */
class TextareaTest extends Testcase
{
    /**
     * @return void
     */
    public function test_failed_if_without_alpine()
    {
        $this->doExpectException('Exception');

        $el = new Textarea('message');

        $el->asModel();
    }

    /**
     * @return void
     */
    public function test_passed_if_as_model()
    {
        $expect = '<textarea name="message"'
            . ' class="form-control"'
            . ' x-model="message"></textarea>';

        $el = new Textarea('message');

        $el->withAlpine();

        $actual = $el->asModel();

        $this->assertEquals($expect, $actual);
    }

    /**
     * @return void
     */
    public function test_passed_if_created()
    {
        $expect = '<textarea name="message"'
            . ' class="form-control"></textarea>';

        $actual = new Textarea('message');

        $this->assertEquals($expect, $actual);
    }

    /**
     * @return void
     */
    public function test_passed_if_disables_on()
    {
        $expect = '<textarea name="message"'
            . ' class="form-control"'
            . ' :disabled="loading"></textarea>';

        $el = new Textarea('message');

        $el->withAlpine();

        $actual = $el->disablesOn('loading');

        $this->assertEquals($expect, $actual);
    }

    /**
     * @return void
     */
    public function test_passed_if_no_styling()
    {
        $expect = '<textarea name="message"></textarea>';

        $el = new Textarea('message');

        $actual = $el->noStyling();

        $this->assertEquals($expect, $actual);
    }

    /**
     * @return void
     */
    public function test_passed_if_no_styling_class()
    {
        $expect = '<textarea name="message"'
            . ' class="is-invalid"></textarea>';

        $el = new Textarea('message');

        $actual = $el->noStyling()->withClass('is-invalid');

        $this->assertEquals($expect, $actual);
    }

    /**
     * @return void
     */
    public function test_passed_if_with_class()
    {
        $expect = '<textarea name="message"'
            . ' class="form-control is-invalid"></textarea>';

        $el = new Textarea('message');

        $actual = $el->withClass('is-invalid');

        $this->assertEquals($expect, $actual);
    }

    /**
     * @return void
     */
    public function test_passed_if_with_custom_styling()
    {
        $expect = '<textarea name="message"'
            . ' class="foo-input"></textarea>';

        $el = new Textarea('message');

        $el->setStyling(new CustomStyle);

        $this->assertEquals($expect, $el);
    }
}
