<?php

namespace Rougin\Fortem;

use Rougin\Fortem\Fixture\CustomStyle;

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
    public function test_for_field()
    {
        $expect = '<label for="name" class="form-label">Name</label>';

        $label = new Label('Name');

        $actual = $label->forField('name');

        $this->assertEquals($expect, (string) $actual);
    }

    /**
     * @return void
     */
    public function test_label_as_required()
    {
        $expect = '<label class="form-label">Name <span class="text-danger">*</span></label>';

        $label = new Label('Name');

        $actual = $label->asRequired();

        $this->assertEquals($expect, $actual);
    }

    /**
     * @return void
     */
    public function test_label_can_be_created()
    {
        $expect = '<label class="form-label">Name</label>';

        $actual = new Label('Name');

        $this->assertEquals($expect, $actual);
    }

    /**
     * @return void
     */
    public function test_label_no_style()
    {
        $expect = '<label>Name</label>';

        $label = new Label('Name');

        $actual = $label->noStyling();

        $this->assertEquals($expect, $actual);
    }

    /**
     * @return void
     */
    public function test_label_no_style_with_class()
    {
        $expect = '<label class="text-uppercase">Name</label>';

        $label = new Label('Name');

        $actual = $label->noStyling()->withClass('text-uppercase');

        $this->assertEquals($expect, $actual);
    }

    /**
     * @return void
     */
    public function test_label_with_class()
    {
        $expect = '<label class="form-label text-uppercase">Name</label>';

        $label = new Label('Name');

        $actual = $label->withClass('text-uppercase');

        $this->assertEquals($expect, $actual);
    }

    /**
     * @return void
     */
    public function test_label_with_custom_style_required()
    {
        $expect = '<label class="foo-label">Name <span class="foo-required">*</span></label>';

        $label = new Label('Name');

        $label->setStyling(new CustomStyle);

        $actual = $label->asRequired();

        $this->assertEquals($expect, $actual);
    }

    /**
     * @return void
     */
    public function test_with_type()
    {
        $expect = '<label type="text" class="form-label">Name</label>';

        $label = new Label('Name');

        $actual = $label->withType('text');

        $this->assertEquals($expect, (string) $actual);
    }
}
