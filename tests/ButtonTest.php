<?php

namespace Rougin\Fortem;

class ButtonTest extends Testcase
{
    /**
     * Tests Button->button().
     *
     * @return void
     */
    public function testButtonCanBeCreated()
    {
        $expected = '<button type="button">Submit</button>';
        $result = (new Button('Submit'))->__toString();

        $this->assertEquals($expected, $result);
    }

    /**
     * Tests Button->button() with a class.
     *
     * @return void
     */
    public function testButtonWithClass()
    {
        $expected = '<button type="button" class="btn btn-primary">Submit</button>';
        $button = new Button('Submit');
        $button->withClass('btn btn-primary');
        $result = $button;

        $this->assertEquals($expected, $result);
    }

    /**
     * Tests Button->withType().
     *
     * @return void
     */
    public function testButtonWithType()
    {
        $expected = '<button type="submit">Submit</button>';
        $result = (new Button('Submit'))->withType('submit')->__toString();

        $this->assertEquals($expected, $result);
    }

    /**
     * Tests Button->onClick().
     *
     * @return void
     */
    public function testButtonOnClick()
    {
        $expected = '<button type="button" @click="submitForm">Submit</button>';
        $result = (new Button('Submit'))->onClick('submitForm')->__toString();

        $this->assertEquals($expected, $result);
    }
}
