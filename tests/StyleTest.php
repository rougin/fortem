<?php

namespace Rougin\Fortem;

use Rougin\Fortem\Styles\BootstrapStyle;

/**
 * @package Fortem
 *
 * @author Rougin Gutib <rougingutib@gmail.com>
 */
class StyleTest extends Testcase
{
    /**
     * @return void
     */
    public function test_passed_if_button()
    {
        $style = new BootstrapStyle;

        $expect = 'btn';

        $actual = $style->button();

        $this->assertEquals($expect, $actual);
    }

    /**
     * @return void
     */
    public function test_passed_if_error()
    {
        $style = new BootstrapStyle;

        $expect = 'text-danger small mb-0';

        $actual = $style->error();

        $this->assertEquals($expect, $actual);
    }

    /**
     * @return void
     */
    public function test_passed_if_input()
    {
        $style = new BootstrapStyle;

        $expect = 'form-control';

        $actual = $style->input();

        $this->assertEquals($expect, $actual);
    }

    /**
     * @return void
     */
    public function test_passed_if_label()
    {
        $style = new BootstrapStyle;

        $expect = 'form-label';

        $actual = $style->label();

        $this->assertEquals($expect, $actual);
    }

    /**
     * @return void
     */
    public function test_passed_if_required()
    {
        $style = new BootstrapStyle;

        $expect = 'text-danger';

        $actual = $style->required();

        $this->assertEquals($expect, $actual);
    }

    /**
     * @return void
     */
    public function test_passed_if_select()
    {
        $style = new BootstrapStyle;

        $expect = 'form-select';

        $actual = $style->select();

        $this->assertEquals($expect, $actual);
    }
}
