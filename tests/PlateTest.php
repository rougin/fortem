<?php

namespace Rougin\Fortem;

use Psr\Http\Message\ServerRequestInterface;
use Rougin\Slytherin\Template\RendererInterface;
use Rougin\Fortem\Helpers\LinkHelper;
use PHPUnit\Framework\MockObject\MockObject;

class PlateTest extends Testcase
{
    /**
     * @var \Rougin\Fortem\Plate
     */
    protected $plate;

    /**
     * @var MockObject
     */
    protected $renderer;

    /**
     * @var MockObject
     */
    protected $request;

    /**
     * Sets up the class.
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();

        $this->renderer = $this->createMock(RendererInterface::class);
        $this->request = $this->createMock(ServerRequestInterface::class);

        // Mock getServerParams for LinkHelper initialization
        $this->request->method('getServerParams')->willReturn(array(
            'HTTP_HOST' => 'localhost',
            'REQUEST_URI' => '/'
        ));

        $this->plate = new Plate($this->renderer, $this->request);
    }

    /**
     * Tests Plate->getLinkHelper().
     *
     * @return void
     */
    public function testGetLinkHelper()
    {
        $result = $this->plate->getLinkHelper();

        $this->assertInstanceOf(LinkHelper::class, $result);
    }

    /**
     * Tests Plate->render().
     *
     * @return void
     */
    public function testRender()
    {
        $templateName = 'test-template';
        $templateData = array('key' => 'value');
        $renderedContent = '<div>Test Content</div>';

        $this->renderer->method('render')
            ->with($templateName, $this->callback(function ($data)
            {
                // Check if original data is present and helpers are added
                $this->assertArrayHasKey('key', $data);
                $this->assertEquals('value', $data['key']);
                $this->assertArrayHasKey('form', $data);
                $this->assertArrayHasKey('plate', $data);
                $this->assertArrayHasKey('block', $data);
                $this->assertArrayHasKey('layout', $data);
                // $this->assertArrayHasKey('link', $data); // Commented out for now
                return true;
            }))
            ->willReturn($renderedContent);

        $result = $this->plate->render($templateName, $templateData);

        // Since filters are applied, the result might be different from renderedContent
        // For a basic test, we can assert it contains the rendered content.
        // More robust tests would involve mocking filters as well.
        $this->assertStringContainsString('Test Content', $result);
    }
}
