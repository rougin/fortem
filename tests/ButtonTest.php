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

        $actual = new Button('Submit');

        $this->assertEquals($expect, $actual);
    }

    /**
     * @return void
     */
    public function test_button_with_class()
    {
        $expect = '<button type="button" class="btn btn-primary">Submit</button>';

        $actual = new Button('Submit');

        $actual->withClass('btn btn-primary');

        $this->assertEquals($expect, $actual);
    }

    /**
     * @return void
     */
    public function test_button_with_type()
    {
        $expect = '<button type="submit">Submit</button>';

        $actual = new Button('Submit');

        $actual->withType('submit');

        $this->assertEquals($expect, $actual);
    }

    /**
     * @return void
     */
    public function test_button_on_click()
    {
        $expect = '<button type="button" @click="submitForm">Submit</button>';

        $actual = new Button('Submit');

        $actual->onClick('submitForm');

        $this->assertEquals($expect, $actual);
    }
}
