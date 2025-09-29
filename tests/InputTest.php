<?php

namespace Rougin\Fortem;

class InputTest extends Testcase
{
    /**
     * Tests Input->input().
     *
     * @return void
     */
    public function testInputCanBeCreated()
    {
        $expected = '<input type="text" name="name">';
        $result = (new Input('name'))->__toString();

        $this->assertEquals($expected, $result);
    }

    /**
     * Tests Input->input() with a class.
     *
     * @return void
     */
    public function testInputWithClass()
    {
        $expected = '<input type="text" name="name" class="form-control">';
        $input = new Input('name');
        $input->withClass('form-control');
        $result = $input;

        $this->assertEquals($expected, $result);
    }

    /**
     * Tests Input->asEmail().
     *
     * @return void
     */
    public function testInputAsEmail()
    {
        $expected = '<input type="email" name="email">';
        $result = (new Input('email'))->asEmail()->__toString();

        $this->assertEquals($expected, $result);
    }

    /**
     * Tests Input->asNumber().
     *
     * @return void
     */
    public function testInputAsNumber()
    {
        $expected = '<input type="number" name="age">';
        $result = (new Input('age'))->asNumber()->__toString();

        $this->assertEquals($expected, $result);
    }

    /**
     * Tests Input->asModel().
     *
     * @return void
     */
    public function testInputAsModel()
    {
        $expected = '<input type="text" name="name" x-model="name">';
        $result = (new Input('name'))->asModel()->__toString();

        $this->assertEquals($expected, $result);
    }

    /**
     * Tests Input->disablesOn().
     *
     * @return void
     */
    public function testInputDisablesOn()
    {
        $expected = '<input type="text" name="name" :disabled="loading">';
        $result = (new Input('name'))->disablesOn('loading')->__toString();

        $this->assertEquals($expected, $result);
    }
}
