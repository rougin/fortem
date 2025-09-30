<?php

namespace Rougin\Fortem;

/**
 * @package Fortem
 *
 * @author Rougin Gutib <rougingutib@gmail.com>
 */
class LabelTest extends Testcase
{
    /**
     * @return void
     */
    public function test_label_as_required()
    {
        $expect = '<label>Name <span class="text-danger">*</span></label>';

        $label = new Label('Name');

        $actual = $label->asRequired();

        $this->assertEquals($expect, $actual);
    }

    /**
     * @return void
     */
    public function test_label_can_be_created()
    {
        $expect = '<label>Name</label>';

        $actual = new Label('Name');

        $this->assertEquals($expect, $actual);
    }

    /**
     * @return void
     */
    public function test_label_with_class()
    {
        $expect = '<label class="form-label">Name</label>';

        $label = new Label('Name');

        $actual = $label->withClass('form-label');

        $this->assertEquals($expect, $actual);
    }
}
