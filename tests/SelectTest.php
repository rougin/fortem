<?php

namespace Rougin\Fortem;

/**
 * @package Fortem
 *
 * @author Rougin Gutib <rougingutib@gmail.com>
 */
class SelectTest extends Testcase
{
    /**
     * @return void
     */
    public function test_as_model()
    {
        $items = array('Male', 'Female');

        $parsed = array();

        foreach ($items as $value => $label)
        {
            $parsed[] = compact('value', 'label');
        }

        $expect = '<select name="gender" x-model="gender"><option value="">Please select</option><option value="0">Male</option><option value="1">Female</option></select>';

        $el = new Select('gender');

        $el->withAlpine();

        $el->withItems($parsed);

        $actual = $el->asModel();

        $this->assertEquals($expect, $actual);
    }

    /**
     * @return void
     */
    public function test_with_assoc_array()
    {
        $items = array(array('value' => 'm', 'label' => 'Male'), array('value' => 'f', 'label' => 'Female'));

        $expect = '<select name="gender"><option value="">Please select</option><option value="m">Male</option><option value="f">Female</option></select>';

        $el = new Select('gender');

        $actual = $el->withItems($items);

        $this->assertEquals($expect, $actual);
    }

    /**
     * @return void
     */
    public function test_with_placeholder()
    {
        $items = array(array('value' => 'm', 'label' => 'Male'), array('value' => 'f', 'label' => 'Female'));

        $expect = '<select name="gender"><option value="">Please select sex</option><option value="m">Male</option><option value="f">Female</option></select>';

        $el = new Select('gender');

        $el->withPlaceholder('Please select sex');

        $actual = $el->withItems($items);

        $this->assertEquals($expect, $actual);
    }

    /**
     * @return void
     */
    public function test_with_simple_array()
    {
        $items = array('Male', 'Female');

        $parsed = array();

        foreach ($items as $value => $label)
        {
            $parsed[] = compact('value', 'label');
        }

        $expect = '<select name="gender"><option value="">Please select</option><option value="0">Male</option><option value="1">Female</option></select>';

        $el = new Select('gender');

        $actual = $el->withItems($parsed);

        $this->assertEquals($expect, $actual);
    }

    /**
     * @return void
     */
    public function test_without_alpine()
    {
        $this->doExpectException('Exception');

        $el = new Select('gender');

        $el->withItems(array())->asModel();
    }
}
