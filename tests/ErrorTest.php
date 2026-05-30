<?php

namespace Rougin\Fortem;

use Rougin\Fortem\Fixture\CustomStyle;

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

        $actual = new Error('error.name');

        $this->assertEquals($expect, $actual);
    }

    /**
     * @return void
     */
    public function test_error_with_custom_style()
    {
        $expect = '<template x-if="error.name"><p class="foo-error" x-text="error.name[0]"></p></template>';

        $actual = new Error('error.name');

        $actual->setStyling(new CustomStyle);

        $this->assertEquals($expect, $actual);
    }

    /**
     * @return void
     */
    public function test_to_string_with_first()
    {
        $expect = '<template x-if="error.name"><p class="text-danger small mb-0" x-text="error.name"></p></template>';

        $actual = new Error('error.name', true);

        $this->assertEquals($expect, (string) $actual);
    }
}
