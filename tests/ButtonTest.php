<?php

namespace Rougin\Fortem;

/**
 * @package Fortem
 *
 * @author Rougin Gutib <rougingutib@gmail.com>
 */
class ButtonTest extends Testcase
{
    /**
     * @return void
     */
    public function test_button_can_be_created()
    {
        $expect = '<button type="button">Submit</button>';

        $button = new Button('Submit');

        $actual = $button->__toString();

        $this->assertEquals($expect, $actual);
    }

    /**
     * @return void
     */
    public function test_button_with_class()
    {
        $expect = '<button type="button" class="btn btn-primary">Submit</button>';

        $button = new Button('Submit');

        $button->withClass('btn btn-primary');

        $actual = $button->__toString();

        $this->assertEquals($expect, $actual);
    }

    /**
     * @return void
     */
    public function test_button_with_type()
    {
        $expect = '<button type="submit">Submit</button>';

        $button = new Button('Submit');

        $button->withType('submit');

        $actual = $button->__toString();

        $this->assertEquals($expect, $actual);
    }

    /**
     * @return void
     */
    public function test_button_on_click()
    {
        $expect = '<button type="button" @click="submitForm">Submit</button>';

        $button = new Button('Submit');

        $button->onClick('submitForm');

        $actual = $button->__toString();

        $this->assertEquals($expect, $actual);
    }
}
