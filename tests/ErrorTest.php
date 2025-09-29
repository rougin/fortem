<?php

namespace Rougin\Fortem;

class ErrorTest extends Testcase
{
    /**
     * Tests Error->error().
     *
     * @return void
     */
    public function testErrorCanBeCreated()
    {
        $expected = '<template x-if="error.name"><p class="text-danger small mb-0" x-text="error.name[0]"></p></template>';
        $result = (new Error('error.name'))->__toString();

        $this->assertEquals($expected, $result);
    }
}
