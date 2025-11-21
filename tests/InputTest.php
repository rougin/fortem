<?php

namespace Rougin\Fortem;

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
    public function test_as_email()
    {
        $expect = '<input type="email" name="email">';

        $el = new Input('email');

        $actual = $el->asEmail();

        $this->assertEquals($expect, $actual);
    }

    /**
     * @return void
     */
    public function test_as_model()
    {
        $expect = '<input type="text" name="name" x-model="name">';

        $el = new Input('name');

        $el->withAlpine();

        $actual = $el->asModel();

        $this->assertEquals($expect, $actual);
    }

    /**
     * @return void
     */
    public function test_as_number()
    {
        $expect = '<input type="number" name="age">';

        $el = new Input('age');

        $actual = $el->asNumber();

        $this->assertEquals($expect, $actual);
    }

    /**
     * @return void
     */
    public function test_can_be_created()
    {
        $expect = '<input type="text" name="name">';

        $actual = new Input('name');

        $this->assertEquals($expect, $actual);
    }

    /**
     * @return void
     */
    public function test_disables_on()
    {
        $expect = '<input type="text" name="name" :disabled="loading">';

        $el = new Input('name');

        $el->withAlpine();

        $actual = $el->disablesOn('loading');

        $this->assertEquals($expect, $actual);
    }

    /**
     * @return void
     */
    public function test_with_class()
    {
        $expect = '<input type="text" name="name" class="form-control">';

        $el = new Input('name');

        $actual = $el->withClass('form-control');

        $this->assertEquals($expect, $actual);
    }

    /**
     * @return void
     */
    public function test_without_alpine()
    {
        $this->doExpectException('Exception');

        $el = new Input('name');

        $el->asModel();
    }
}
