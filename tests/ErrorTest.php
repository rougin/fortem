<?php

namespace Rougin\Fortem;

/**
 * @package Fortem
 *
 * @author Rougin Gutib <rougingutib@gmail.com>
 */
class ErrorTest extends Testcase
{
    /**
     * @return void
     */
    public function test_error_can_be_created()
    {
        $expect = '<template x-if="error.name"><p class="text-danger small mb-0" x-text="error.name[0]"></p></template>';

        $error = new Error('error.name');

        $actual = $error->__toString();

        $this->assertEquals($expect, $actual);
    }
}
