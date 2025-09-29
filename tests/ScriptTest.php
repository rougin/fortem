<?php

namespace Rougin\Fortem;

class ScriptTest extends Testcase
{
    /**
     * Tests Script->script() with multiple methods.
     *
     * @return void
     */
    public function testScriptWithMultipleMethods()
    {
        $expected = 'let data = {"name":"John Doe","age":30,"loading":false,"error":{}};';
        $result = (new Script('data'))
            ->with('name', 'John Doe')
            ->with('age', 30)
            ->withLoading()
            ->withError()
            ->__toString();

        $this->assertEquals($expected, $result);
    }

    /**
     * Tests Script->with().
     *
     * @return void
     */
    public function testScriptWith()
    {
        $expected = 'let config = {"key":"value"};';
        $result = (new Script('config'))->with('key', 'value')->__toString();

        $this->assertEquals($expected, $result);
    }

    /**
     * Tests Script->withLoading().
     *
     * @return void
     */
    public function testScriptWithLoading()
    {
        $expected = 'let app = {"loading":false};';
        $result = (new Script('app'))->withLoading()->__toString();

        $this->assertEquals($expected, $result);
    }

    /**
     * Tests Script->withError().
     *
     * @return void
     */
    public function testScriptWithError()
    {
        $expected = 'let app = {"error":{}};';
        $result = (new Script('app'))->withError()->__toString();

        $this->assertEquals($expected, $result);
    }
}
