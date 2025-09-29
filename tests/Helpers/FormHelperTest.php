<?php

namespace Rougin\Fortem\Helpers;

use Rougin\Fortem\Button;
use Rougin\Fortem\Error;
use Rougin\Fortem\Input;
use Rougin\Fortem\Label;
use Rougin\Fortem\Script;
use Rougin\Fortem\Select;
use Rougin\Fortem\Testcase;

/**
 * @package Fortem
 *
 * @author Rougin Gutib <rougingutib@gmail.com>
 */
class FormHelperTest extends Testcase
{
    /**
     * @var \Rougin\Fortem\Helpers\FormHelper
     */
    protected $form;

    /**
     * @return void
     */
    protected function doSetUp()
    {
        parent::doSetUp();

        $this->form = new FormHelper;
    }

    /**
     * @return void
     */
    public function test_button()
    {
        $expect = '<button type="button">Submit</button>';

        $actual = $this->form->button('Submit')->__toString();

        $this->assertEquals($expect, $actual);

        $expect = '<button type="button" class="btn btn-primary">Submit</button>';

        $actual = $this->form->button('Submit', 'btn btn-primary')->__toString();

        $this->assertEquals($expect, $actual);
    }

    /**
     * @return void
     */
    public function test_error()
    {
        $expect = '<template x-if="error.name"><p class="text-danger small mb-0" x-text="error.name[0]"></p></template>';

        $actual = $this->form->error('error.name')->__toString();

        $this->assertEquals($expect, $actual);
    }

    /**
     * @return void
     */
    public function test_input()
    {
        $expect = '<input type="text" name="name">';

        $actual = $this->form->input('name')->__toString();

        $this->assertEquals($expect, $actual);

        $expect = '<input type="text" name="name" class="form-control">';

        $actual = $this->form->input('name', 'form-control')->__toString();

        $this->assertEquals($expect, $actual);
    }

    /**
     * @return void
     */
    public function test_label()
    {
        $expect = '<label>Name</label>';

        $actual = $this->form->label('Name')->__toString();

        $this->assertEquals($expect, $actual);

        $expect = '<label class="form-label">Name</label>';

        $actual = $this->form->label('Name', 'form-label')->__toString();

        $this->assertEquals($expect, $actual);
    }

    /**
     * @return void
     */
    public function test_name()
    {
        $expect = 'form';

        $actual = $this->form->name();

        $this->assertEquals($expect, $actual);
    }

    /**
     * @return void
     */
    public function test_script()
    {
        $expect = 'let data = [];';

        $actual = $this->form->script('data')->__toString();

        $this->assertEquals($expect, $actual);
    }

    /**
     * @return void
     */
    public function test_select()
    {
        $items = array('Male', 'Female');

        $expect = '<select name="gender"><option value="">Please select</option><option value="0">Male</option><option value="1">Female</option></select>';

        $actual = $this->form->select('gender', $items)->__toString();

        $this->assertEquals($expect, $actual);

        $assocItems = array(array('value' => 'm', 'label' => 'Male'), array('value' => 'f', 'label' => 'Female'));

        $expect = '<select name="gender"><option value="">Please select</option><option value="m">Male</option><option value="f">Female</option></select>';

        $actual = $this->form->select('gender', $assocItems)->__toString();

        $this->assertEquals($expect, $actual);
    }

    /**
     * @return void
     */
    public function test_with_alpine()
    {
        $actual = $this->form->withAlpine();

        $this->assertInstanceOf(FormHelper::class, $actual);
    }

    /**
     * @return void
     */
    public function test_without_alpine()
    {
        $actual = $this->form->withoutAlpine();

        $this->assertInstanceOf(FormHelper::class, $actual);
    }
}
