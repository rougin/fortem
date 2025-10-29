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
     * @return void
     */
    public function test_get_current()
    {
        $server = $this->newServer();

        $link = 'http://localhost';

        $helper = new LinkHelper($link, $server);

        $expect = 'http://localhost/';

        $actual = $helper->getCurrent();

        $this->assertEquals($expect, $actual);
    }

    /**
     * @return void
     */
    public function test_is_current()
    {
        $server = $this->newServer();

        $link = 'http://localhost';

        $helper = new LinkHelper($link, $server);

        $actual = $helper->isCurrent('/');

        $this->assertTrue($actual);

        $actual = $helper->isCurrent('/other');

        $this->assertFalse($actual);
    }

    /**
     * @return array<string, string>
     */
    protected function newServer()
    {
        $server = array();

        $server['HTTP_HOST'] = 'localhost';

        $server['REQUEST_URI'] = '/';

        return $server;
    }
}
