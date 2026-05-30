<?php

namespace Rougin\Fortem;

use Rougin\Fortem\Fixture\CustomStyle;

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
    public function test_failed_if_without_alpine()
    {
        $this->doExpectException('Exception');

        $actual = new Button('Submit');

        $actual->onClick('submitForm');
    }

    /**
     * @return void
     */
    public function test_passed_if_created()
    {
        $expect = '<button type="button" class="btn">Submit</button>';

        $actual = new Button('Submit');

        $this->assertEquals($expect, $actual);
    }

    /**
     * @return void
     */
    public function test_passed_if_no_styling()
    {
        $expect = '<button type="button">Submit</button>';

        $actual = new Button('Submit');

        $actual->noStyling();

        $this->assertEquals($expect, $actual);
    }

    /**
     * @return void
     */
    public function test_passed_if_no_styling_class()
    {
        $expect = '<button type="button" class="btn-lg">'
            . 'Submit</button>';

        $actual = new Button('Submit');

        $actual->noStyling()->withClass('btn-lg');

        $this->assertEquals($expect, $actual);
    }

    /**
     * @return void
     */
    public function test_passed_if_on_click()
    {
        $expect = '<button type="button"'
            . ' @click="submitForm" class="btn">'
            . 'Submit</button>';

        $actual = new Button('Submit');

        $actual->withAlpine();

        $actual->onClick('submitForm');

        $this->assertEquals($expect, $actual);
    }

    /**
     * @return void
     */
    public function test_passed_if_with_class()
    {
        $expect = '<button type="button"'
            . ' class="btn btn-primary">'
            . 'Submit</button>';

        $actual = new Button('Submit');

        $actual->withClass('btn-primary');

        $this->assertEquals($expect, $actual);
    }

    /**
     * @return void
     */
    public function test_passed_if_with_custom_styling()
    {
        $expect = '<button type="button" class="foo-btn">'
            . 'Submit</button>';

        $actual = new Button('Submit');

        $actual->setStyling(new CustomStyle);

        $this->assertEquals($expect, $actual);
    }

    /**
     * @return void
     */
    public function test_passed_if_with_type()
    {
        $expect = '<button type="submit" class="btn">'
            . 'Submit</button>';

        $actual = new Button('Submit');

        $actual->withType('submit');

        $this->assertEquals($expect, $actual);
    }
}
