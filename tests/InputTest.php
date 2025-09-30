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
    public function test_input_as_email()
    {
        $expect = '<input type="email" name="email">';

        $input = new Input('email');

        $actual = $input->asEmail();

        $this->assertEquals($expect, $actual);
    }

    /**
     * @return void
     */
    public function test_input_as_model()
    {
        $expect = '<input type="text" name="name" x-model="name">';

        $input = new Input('name');

        $actual = $input->asModel();

        $this->assertEquals($expect, $actual);
    }

    /**
     * @return void
     */
    public function test_input_as_number()
    {
        $expect = '<input type="number" name="age">';

        $input = new Input('age');

        $actual = $input->asNumber();

        $this->assertEquals($expect, $actual);
    }

    /**
     * @return void
     */
    public function test_input_can_be_created()
    {
        $expect = '<input type="text" name="name">';

        $actual = new Input('name');

        $this->assertEquals($expect, $actual);
    }

    /**
     * @return void
     */
    public function test_input_disables_on()
    {
        $expect = '<input type="text" name="name" :disabled="loading">';

        $input = new Input('name');

        $actual = $input->disablesOn('loading');

        $this->assertEquals($expect, $actual);
    }

    /**
     * @return void
     */
    public function test_input_with_class()
    {
        $expect = '<input type="text" name="name" class="form-control">';

        $input = new Input('name');

        $actual = $input->withClass('form-control');

        $this->assertEquals($expect, $actual);
    }
}
