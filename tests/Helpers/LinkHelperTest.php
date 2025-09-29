<?php

namespace Rougin\Fortem\Helpers;

use Rougin\Fortem\Testcase;

/**
 * @package Fortem
 *
 * @author Rougin Gutib <rougingutib@gmail.com>
 */
class LinkHelperTest extends Testcase
{
    /**
     * @var array<string, string>
     */
    protected $server = array();

    /**
     * @return void
     */
    protected function doSetUp()
    {
        parent::doSetUp();

        $server = array();

        $server['HTTP_HOST'] = 'localhost';

        $server['REQUEST_URI'] = '/';

        $this->server = $server;
    }

    /**
     * @return void
     */
    public function test_get_current()
    {
        $link = 'http://localhost';

        $helper = new LinkHelper($link, $this->server);

        $expect = 'http://localhost/';

        $actual = $helper->getCurrent();

        $this->assertEquals($expect, $actual);
    }

    /**
     * @return void
     */
    public function test_is_current()
    {
        $link = 'http://localhost';

        $helper = new LinkHelper($link, $this->server);

        $actual = $helper->isCurrent('/');

        $this->assertTrue($actual);

        $actual = $helper->isCurrent('/other');

        $this->assertFalse($actual);
    }
}
