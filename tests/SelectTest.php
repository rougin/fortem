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
    public function test_select_as_model()
    {
        $items = array('Male', 'Female');

        $parsed = array();

        foreach ($items as $value => $label)
        {
            $parsed[] = compact('value', 'label');
        }

        $expect = '<select name="gender" x-model="gender"><option value="">Please select</option><option value="0">Male</option><option value="1">Female</option></select>';

        $select = new Select('gender');

        $select->withItems($parsed);

        $actual = $select->asModel()->__toString();

        $this->assertEquals($expect, $actual);
    }

    /**
     * @return void
     */
    public function test_select_with_assoc_array()
    {
        $items = array(array('value' => 'm', 'label' => 'Male'), array('value' => 'f', 'label' => 'Female'));

        $expect = '<select name="gender"><option value="">Please select</option><option value="m">Male</option><option value="f">Female</option></select>';

        $select = new Select('gender');

        $select->withItems($items);

        $actual = $select->__toString();

        $this->assertEquals($expect, $actual);
    }

    /**
     * @return void
     */
    public function test_select_with_simple_array()
    {
        $items = array('Male', 'Female');

        $parsed = array();

        foreach ($items as $value => $label)
        {
            $parsed[] = compact('value', 'label');
        }

        $expect = '<select name="gender"><option value="">Please select</option><option value="0">Male</option><option value="1">Female</option></select>';

        $select = new Select('gender');

        $select->withItems($parsed);

        $actual = $select->__toString();

        $this->assertEquals($expect, $actual);
    }
}
