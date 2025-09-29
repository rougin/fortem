<?php

namespace Rougin\Fortem\Helpers;

use Rougin\Fortem\Testcase;

class LinkHelperTest extends Testcase
{
    /**
     * @var array<string, string>
     */
    protected $server = array();

    /**
     * Sets up the class.
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();

        $this->server = array();
        $this->server['HTTP_HOST'] = 'localhost';
        $this->server['REQUEST_URI'] = '/';
    }

    /**
     * Tests LinkHelper->getCurrent().
     *
     * @return void
     */
    public function testGetCurrent()
    {
        $link = 'http://localhost';
        $helper = new LinkHelper($link, $this->server);

        $this->assertEquals('http://localhost/', $helper->getCurrent());
    }

    /**
     * Tests LinkHelper->isCurrent().
     *
     * @return void
     */
    public function testIsCurrent()
    {
        $link = 'http://localhost';
        $helper = new LinkHelper($link, $this->server);

        $this->assertTrue($helper->isCurrent('/'));
        $this->assertFalse($helper->isCurrent('/other'));
    }
}
