<?php

namespace Rougin\Fortem;

class LabelTest extends Testcase
{
    /**
     * Tests Label->label().
     *
     * @return void
     */
    public function testLabelCanBeCreated()
    {
        $expected = '<label>Name</label>';
        $result = (new Label('Name'))->__toString();

        $this->assertEquals($expected, $result);
    }

    /**
     * Tests Label->label() with a class.
     *
     * @return void
     */
    public function testLabelWithClass()
    {
        $expected = '<label class="form-label">Name</label>';
        $label = new Label('Name');
        $label->withClass('form-label');
        $result = $label;

        $this->assertEquals($expected, $result);
    }

    /**
     * Tests Label->asRequired().
     *
     * @return void
     */
    public function testLabelAsRequired()
    {
        $expected = '<label>Name <span class="text-danger">*</span></label>';
        $result = (new Label('Name'))->asRequired()->__toString();

        $this->assertEquals($expected, $result);
    }
}
