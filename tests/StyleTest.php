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
    public function test_bootstrap_button_class()
    {
        $style = new BootstrapStyle;

        $expected = 'btn';

        $actual = $style->button();

        $this->assertEquals($expected, $actual);
    }

    /**
     * @return void
     */
    public function test_bootstrap_error_class()
    {
        $style = new BootstrapStyle;

        $expected = 'text-danger small mb-0';

        $actual = $style->error();

        $this->assertEquals($expected, $actual);
    }

    /**
     * @return void
     */
    public function test_bootstrap_input_class()
    {
        $style = new BootstrapStyle;

        $expected = 'form-control';

        $actual = $style->input();

        $this->assertEquals($expected, $actual);
    }

    /**
     * @return void
     */
    public function test_bootstrap_label_class()
    {
        $style = new BootstrapStyle;

        $expected = 'form-label';

        $actual = $style->label();

        $this->assertEquals($expected, $actual);
    }

    /**
     * @return void
     */
    public function test_bootstrap_required_class()
    {
        $style = new BootstrapStyle;

        $expected = 'text-danger';

        $actual = $style->required();

        $this->assertEquals($expected, $actual);
    }

    /**
     * @return void
     */
    public function test_bootstrap_select_class()
    {
        $style = new BootstrapStyle;

        $expected = 'form-select';

        $actual = $style->select();

        $this->assertEquals($expected, $actual);
    }
}
