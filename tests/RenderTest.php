<?php

namespace Rougin\Fortem;

use Rougin\Slytherin\Template\RendererInterface;
use PHPUnit\Framework\MockObject\MockObject;

/**
 * @package Fortem
 *
 * @author Rougin Gutib <rougingutib@gmail.com>
 */
class RenderTest extends Testcase
{
    /**
     * @var \Rougin\Fortem\Render
     */
    protected $render;

    /**
     * @var MockObject
     */
    protected $parent;

    /**
     * @return void
     */
    protected function doSetUp()
    {
        parent::doSetUp();

        $this->parent = $this->createMock(RendererInterface::class);

        $this->render = new Render($this->parent);
    }

    /**
     * Tests Render->render().
     *
     * @return void
     */
    public function test_render_method()
    {
        $expect = '<h1>Hello, value!</h1>';

        $name = 'test-template';

        $data = array('item' => 'value');

        $this->parent->method('render')
            ->with($name, $data)
            ->willReturn($expect);

        $actual = $this->render->render($name, $data);

        $this->assertEquals($expect, $actual);
    }
}
