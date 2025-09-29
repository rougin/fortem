<?php

namespace Rougin\Fortem\Helpers;

use Rougin\Fortem\Button;
use Rougin\Fortem\Error;
use Rougin\Fortem\Input;
use Rougin\Fortem\Label;
use Rougin\Fortem\Script;
use Rougin\Fortem\Select;
use Rougin\Fortem\Testcase;

class FormHelperTest extends Testcase
{
    /**
     * @var \Rougin\Fortem\Helpers\FormHelper
     */
    protected $form;

    /**
     * Sets up the class.
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();

        $this->form = new FormHelper;
    }

    /**
     * Tests FormHelper->button().
     *
     * @return void
     */
    public function test_button()
    {
        $result = $this->form->button('Submit');
        $this->assertInstanceOf(Button::class, $result);
        $this->assertEquals('<button type="button">Submit</button>', $result);

        $resultWithClass = $this->form->button('Submit', 'btn btn-primary');
        $this->assertEquals('<button type="button" class="btn btn-primary">Submit</button>', $resultWithClass);
    }

    /**
     * Tests FormHelper->error().
     *
     * @return void
     */
    public function test_error()
    {
        $result = $this->form->error('error.name');
        $this->assertInstanceOf(Error::class, $result);
        $expected = '<template x-if="error.name"><p class="text-danger small mb-0" x-text="error.name[0]"></p></template>';
        $this->assertEquals($expected, $result);
    }

    /**
     * Tests FormHelper->input().
     *
     * @return void
     */
    public function test_input()
    {
        $result = $this->form->input('name');
        $this->assertInstanceOf(Input::class, $result);
        $this->assertEquals('<input type="text" name="name">', $result);

        $resultWithClass = $this->form->input('name', 'form-control');
        $this->assertEquals('<input type="text" name="name" class="form-control">', $resultWithClass);
    }

    /**
     * Tests FormHelper->label().
     *
     * @return void
     */
    public function test_label()
    {
        $result = $this->form->label('Name');
        $this->assertInstanceOf(Label::class, $result);
        $this->assertEquals('<label>Name</label>', $result);

        $resultWithClass = $this->form->label('Name', 'form-label');
        $this->assertEquals('<label class="form-label">Name</label>', $resultWithClass);
    }

    /**
     * Tests FormHelper->name().
     *
     * @return void
     */
    public function test_name()
    {
        $this->assertEquals('form', $this->form->name());
    }

    /**
     * Tests FormHelper->script().
     *
     * @return void
     */
    public function test_script()
    {
        $result = $this->form->script('data');
        $this->assertInstanceOf(Script::class, $result);
        $expected = 'let data = [];';
        $this->assertEquals($expected, $result);
    }

    /**
     * Tests FormHelper->select().
     *
     * @return void
     */
    public function test_select()
    {
        $items = array('Male', 'Female');
        $result = $this->form->select('gender', $items);
        $this->assertInstanceOf(Select::class, $result);
        $expected = '<select name="gender"><option value="">Please select</option><option value="0">Male</option><option value="1">Female</option></select>';
        $this->assertEquals($expected, $result);

        $assocItems = array(array('value' => 'm', 'label' => 'Male'), array('value' => 'f', 'label' => 'Female'));
        $resultAssoc = $this->form->select('gender', $assocItems);
        $expectedAssoc = '<select name="gender"><option value="">Please select</option><option value="m">Male</option><option value="f">Female</option></select>';
    }

    /**
     * Tests FormHelper->withAlpine().
     *
     * @return void
     */
    public function test_with_alpine()
    {
        $form = $this->form->withAlpine();
        $this->assertInstanceOf(FormHelper::class, $form);
    }

    /**
     * Tests FormHelper->withoutAlpine().
     *
     * @return void
     */
    public function test_without_alpine()
    {
        $form = $this->form->withoutAlpine();
        $this->assertInstanceOf(FormHelper::class, $form);
    }
}
