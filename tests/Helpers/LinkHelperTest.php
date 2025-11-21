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

        $link = new LinkHelper($server);

        $expect = 'http://localhost/';

        $actual = $link->__toString();

        $this->assertEquals($expect, $actual);
    }

    /**
     * @return void
     */
    public function test_get_name()
    {
        $server = $this->newServer();

        $link = new LinkHelper($server);

        $expect = 'url';

        $actual = $link->name();

        $this->assertEquals($expect, $actual);
    }

    /**
     * @return void
     */
    public function test_is_current()
    {
        $server = $this->newServer();

        $link = new LinkHelper($server);

        $actual = $link->isActive('/');

        $this->assertTrue($actual);

        $actual = $link->isActive('/other');

        $this->assertFalse($actual);
    }

    /**
     * @return void
     */
    public function test_other_base_url()
    {
        $server = $this->newServer();

        $link = new LinkHelper($server);

        $expect = 'http://roug.in/';

        $link->setBase('roug.in');

        $actual = $link->__toString();

        $this->assertEquals($expect, $actual);
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
