<?php

namespace Rougin\Fortem;

use Rougin\Slytherin\Template\RendererInterface;
use PHPUnit\Framework\MockObject\MockObject;

class RenderTest extends Testcase
{
    /**
     * @var \Rougin\Fortem\Render
     */
    protected $render;

    /**
     * @var MockObject
     */
    protected $parentRenderer;

    /**
     * Sets up the class.
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();

        $this->parentRenderer = $this->createMock(RendererInterface::class);
        $this->render = new Render($this->parentRenderer);
    }

    /**
     * Tests Render->render().
     *
     * @return void
     */
    public function testRenderMethod()
    {
        $templateName = 'test-template';
        $templateData = array('item' => 'value');
        $expectedOutput = '<h1>Hello, value!</h1>';

        $this->parentRenderer->method('render')
            ->with($templateName, $templateData)
            ->willReturn($expectedOutput);

        $result = $this->render->render($templateName, $templateData);

        $this->assertEquals($expectedOutput, $result);
    }
}
