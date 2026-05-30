<?php

namespace Rougin\Fortem;

use Rougin\Fortem\Fixture\CustomStyle;

/**
 * @package Fortem
 *
 * @author Rougin Gutib <rougingutib@gmail.com>
 */
class InputTest extends Testcase
{
    /**
     * @return void
     */
    public function test_failed_if_without_alpine()
    {
        $this->doExpectException('Exception');

        $el = new Input('name');

        $el->asModel();
    }

    /**
     * @return void
     */
    public function test_passed_if_as_email()
    {
        $expect = '<input type="email"'
            . ' name="email"'
            . ' class="form-control">';

        $el = new Input('email');

        $actual = $el->asEmail();

        $this->assertEquals($expect, $actual);
    }

    /**
     * @return void
     */
    public function test_passed_if_as_model()
    {
        $expect = '<input type="text"'
            . ' name="name"'
            . ' x-model="name"'
            . ' class="form-control">';

        $el = new Input('name');

        $el->withAlpine();

        $actual = $el->asModel();

        $this->assertEquals($expect, $actual);
    }

    /**
     * @return void
     */
    public function test_passed_if_as_number()
    {
        $expect = '<input type="number"'
            . ' name="age"'
            . ' class="form-control">';

        $el = new Input('age');

        $actual = $el->asNumber();

        $this->assertEquals($expect, $actual);
    }

    /**
     * @return void
     */
    public function test_passed_if_created()
    {
        $expect = '<input type="text"'
            . ' name="name"'
            . ' class="form-control">';

        $actual = new Input('name');

        $this->assertEquals($expect, $actual);
    }

    /**
     * @return void
     */
    public function test_passed_if_disables_on()
    {
        $expect = '<input type="text"'
            . ' name="name"'
            . ' :disabled="loading"'
            . ' class="form-control">';

        $el = new Input('name');

        $el->withAlpine();

        $actual = $el->disablesOn('loading');

        $this->assertEquals($expect, $actual);
    }

    /**
     * @return void
     */
    public function test_passed_if_no_styling()
    {
        $expect = '<input type="text" name="name">';

        $el = new Input('name');

        $actual = $el->noStyling();

        $this->assertEquals($expect, $actual);
    }

    /**
     * @return void
     */
    public function test_passed_if_no_styling_class()
    {
        $expect = '<input type="text"'
            . ' name="name"'
            . ' class="is-invalid">';

        $el = new Input('name');

        $actual = $el->noStyling()->withClass('is-invalid');

        $this->assertEquals($expect, $actual);
    }

    /**
     * @return void
     */
    public function test_passed_if_with_class()
    {
        $expect = '<input type="text"'
            . ' name="name"'
            . ' class="form-control is-invalid">';

        $el = new Input('name');

        $actual = $el->withClass('is-invalid');

        $this->assertEquals($expect, $actual);
    }

    /**
     * @return void
     */
    public function test_passed_if_with_custom_styling()
    {
        $expect = '<input type="text"'
            . ' name="name"'
            . ' class="foo-input">';

        $el = new Input('name');

        $el->setStyling(new CustomStyle);

        $this->assertEquals($expect, $el);
    }
}
