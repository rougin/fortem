<?php

namespace Rougin\Fortem\Helpers;

use Rougin\Fortem\Testcase;

/**
 * @package Fortem
 *
 * @author Rougin Gutib <rougingutib@gmail.com>
 */
class FormHelperTest extends Testcase
{
    /**
     * @return void
     */
    public function test_button()
    {
        $form = new FormHelper;

        $expect = '<button type="button">Submit</button>';

        $actual = $form->button('Submit');

        $this->assertEquals($expect, $actual);

        $expect = '<button type="button" class="btn btn-primary">Submit</button>';

        $actual = $form->button('Submit', 'btn btn-primary');

        $this->assertEquals($expect, $actual);
    }

    /**
     * @return void
     */
    public function test_error()
    {
        $form = new FormHelper;

        $expect = '<template x-if="error.name"><p class="text-danger small mb-0" x-text="error.name[0]"></p></template>';

        $actual = $form->error('error.name');

        $this->assertEquals($expect, $actual);
    }

    /**
     * @return void
     */
    public function test_input()
    {
        $form = new FormHelper;

        $expect = '<input type="text" name="name">';

        $actual = $form->input('name');

        $this->assertEquals($expect, $actual);

        $expect = '<input type="text" name="name" class="form-control">';

        $actual = $form->input('name', 'form-control');

        $this->assertEquals($expect, $actual);
    }

    /**
     * @return void
     */
    public function test_label()
    {
        $expect = '<label>Name</label>';

        $form = new FormHelper;

        $actual = $form->label('Name');

        $this->assertEquals($expect, $actual);

        $expect = '<label class="form-label">Name</label>';

        $actual = $form->label('Name', 'form-label');

        $this->assertEquals($expect, $actual);
    }

    /**
     * @return void
     */
    public function test_name()
    {
        $form = new FormHelper;

        $expect = 'form';

        $actual = $form->name();

        $this->assertEquals($expect, $actual);
    }

    /**
     * @return void
     */
    public function test_script()
    {
        $expect = 'let data = [];';

        $form = new FormHelper;

        $actual = $form->script('data');

        $this->assertEquals($expect, $actual);
    }

    /**
     * @return void
     */
    public function test_select()
    {
        $expect = '<select name="gender"><option value="">Please select</option><option value="0">Male</option><option value="1">Female</option></select>';

        $form = new FormHelper;

        $items = array('Male', 'Female');

        $actual = $form->select('gender', $items);

        $this->assertEquals($expect, $actual);

        $items = array();
        $items[] = array('value' => 'm', 'label' => 'Male');
        $items[] = array('value' => 'f', 'label' => 'Female');

        $expect = '<select name="gender"><option value="">Please select</option><option value="m">Male</option><option value="f">Female</option></select>';

        $actual = $form->select('gender', $items);

        $this->assertEquals($expect, $actual);
    }

    /**
     * @return void
     */
    public function test_select_with_class()
    {
        $expect = '<select name="gender" class="form-select"><option value="">Please select</option><option value="0">Male</option><option value="1">Female</option></select>';

        $form = new FormHelper;

        $items = array('Male', 'Female');

        $actual = $form->select('gender', $items, 'form-select');

        $this->assertEquals($expect, $actual);
    }

    /**
     * @return void
     */
    public function test_with_alpine()
    {
        $form = new FormHelper;

        $expect = 'Rougin\Fortem\Helpers\FormHelper';

        $actual = $form->withAlpine();

        $this->assertInstanceOf($expect, $actual);
    }

    /**
     * @return void
     */
    public function test_without_alpine()
    {
        $form = new FormHelper;

        $expect = 'Rougin\Fortem\Helpers\FormHelper';

        $actual = $form->withoutAlpine();

        $this->assertInstanceOf($expect, $actual);
    }
}
