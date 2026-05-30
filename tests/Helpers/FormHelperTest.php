<?php

namespace Rougin\Fortem\Helpers;

use Rougin\Fortem\Fixture\CustomStyle;
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

        $expect = '<button type="button" class="btn">Submit</button>';

        $actual = $form->button('Submit');

        $this->assertEquals($expect, $actual);

        $expect = '<button type="button" class="btn btn-primary">Submit</button>';

        $actual = $form->button('Submit');

        $actual->withClass('btn-primary');

        $this->assertEquals($expect, $actual);
    }

    /**
     * @return void
     */
    public function test_error()
    {
        $form = new FormHelper;

        $form->withAlpine();

        $expect = '<template x-if="error.name"><p class="text-danger small mb-0" x-text="error.name[0]"></p></template>';

        $actual = $form->error('error.name');

        $this->assertEquals($expect, $actual);
    }

    /**
     * @return void
     */
    public function test_error_without_alpine()
    {
        $this->doExpectException('Exception');

        $form = new FormHelper;

        $form->error('error.name');
    }

    /**
     * @return void
     */
    public function test_input()
    {
        $form = new FormHelper;

        $expect = '<input type="text" name="name" class="form-control">';

        $actual = $form->input('name');

        $this->assertEquals($expect, $actual);

        $expect = '<input type="text" name="name" class="form-control is-invalid">';

        $actual = $form->input('name');

        $actual->withClass('is-invalid');

        $this->assertEquals($expect, $actual);
    }

    /**
     * @return void
     */
    public function test_label()
    {
        $expect = '<label class="form-label">Name</label>';

        $form = new FormHelper;

        $actual = $form->label('Name');

        $this->assertEquals($expect, $actual);

        $expect = '<label class="form-label text-uppercase">Name</label>';

        $actual = $form->label('Name');

        $actual->withClass('text-uppercase');

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
    public function test_no_style_per_element()
    {
        $form = new FormHelper;

        $form->useStyling(new CustomStyle);

        $expect = '<label>Name</label>';

        $actual = $form->label('Name')->noStyling();

        $this->assertEquals($expect, $actual);
    }

    /**
     * @return void
     */
    public function test_script()
    {
        $expect = 'let data = [];';

        $form = new FormHelper;

        $form->withAlpine();

        $actual = $form->script('data');

        $this->assertEquals($expect, $actual);
    }

    /**
     * @return void
     */
    public function test_script_without_alpine()
    {
        $this->doExpectException('Exception');

        $form = new FormHelper;

        $form->noAlpine();

        $form->script('data');
    }

    /**
     * @return void
     */
    public function test_select()
    {
        $expect = '<select name="gender" class="form-select"><option value="">Please select</option><option value="0">Male</option><option value="1">Female</option></select>';

        $form = new FormHelper;

        $items = array('Male', 'Female');

        $actual = $form->select('gender', $items);

        $this->assertEquals($expect, $actual);

        $items = array();
        $items[] = array('value' => 'm', 'label' => 'Male');
        $items[] = array('value' => 'f', 'label' => 'Female');

        $expect = '<select name="gender" class="form-select"><option value="">Please select</option><option value="m">Male</option><option value="f">Female</option></select>';

        $actual = $form->select('gender', $items);

        $this->assertEquals($expect, $actual);
    }

    /**
     * @return void
     */
    public function test_select_with_class()
    {
        $expect = '<select name="gender" class="form-select is-invalid"><option value="">Please select</option><option value="0">Male</option><option value="1">Female</option></select>';

        $form = new FormHelper;

        $items = array('Male', 'Female');

        $actual = $form->select('gender', $items);

        $actual->withClass('is-invalid');

        $this->assertEquals($expect, $actual);
    }

    /**
     * @return void
     */
    public function test_use_style()
    {
        $form = new FormHelper;

        $form->useStyling(new CustomStyle);

        $expect = '<input type="text" name="name" class="foo-input">';

        $actual = $form->input('name');

        $this->assertEquals($expect, $actual);

        $expect = '<button type="button" class="foo-btn">Submit</button>';

        $actual = $form->button('Submit');

        $this->assertEquals($expect, $actual);

        $expect = '<label class="foo-label">Name</label>';

        $actual = $form->label('Name');

        $this->assertEquals($expect, $actual);
    }
}
