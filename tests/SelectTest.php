<?php

namespace Rougin\Fortem;

class SelectTest extends Testcase
{
    /**
     * Tests Select->select() with a simple array.
     *
     * @return void
     */
    public function test_select_with_simple_array()
    {
        $items = array('Male', 'Female');
        $transformedItems = array();
        foreach ($items as $value => $label)
        {
            $transformedItems[] = array('value' => $value, 'label' => $label);
        }

        $expected = '<select name="gender"><option value="">Please select</option><option value="0">Male</option><option value="1">Female</option></select>';
        $select = new Select('gender');
        $select->withItems($transformedItems);
        $result = $select;

        $this->assertEquals($expected, $result);
    }

    /**
     * Tests Select->select() with an associative array.
     *
     * @return void
     */
    public function test_select_with_associative_array()
    {
        $items = array(array('value' => 'm', 'label' => 'Male'), array('value' => 'f', 'label' => 'Female'));
        $expected = '<select name="gender"><option value="">Please select</option><option value="m">Male</option><option value="f">Female</option></select>';
        $select = new Select('gender');
        $select->withItems($items);
        $result = $select;

        $this->assertEquals($expected, $result);
    }

    /**
     * Tests Select->asModel().
     *
     * @return void
     */
    public function test_select_as_model()
    {
        $items = array('Male', 'Female');
        $transformedItems = array();
        foreach ($items as $value => $label)
        {
            $transformedItems[] = array('value' => $value, 'label' => $label);
        }

        $expected = '<select name="gender" x-model="gender"><option value="">Please select</option><option value="0">Male</option><option value="1">Female</option></select>';
        $select = new Select('gender');
        $select->withItems($transformedItems);
        $result = $select->asModel()->__toString();

        $this->assertEquals($expected, $result);
    }
}
