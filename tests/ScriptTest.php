<?php

namespace Rougin\Fortem;

/**
 * @package Fortem
 *
 * @author Rougin Gutib <rougingutib@gmail.com>
 */
class ScriptTest extends Testcase
{
    /**
     * @return void
     */
    public function test_script_with()
    {
        $expect = 'let config = {"key":"value"};';

        $script = new Script('config');

        $script->with('key', 'value');

        $actual = $script->__toString();

        $this->assertEquals($expect, $actual);
    }

    /**
     * @return void
     */
    public function test_script_with_error()
    {
        $expect = 'let app = {"error":{}};';

        $script = new Script('app');

        $script->withError();

        $actual = $script->__toString();

        $this->assertEquals($expect, $actual);
    }

    /**
     * @return void
     */
    public function test_script_with_loading()
    {
        $expect = 'let app = {"loading":false};';

        $script = new Script('app');

        $script->withLoading();

        $actual = $script->__toString();

        $this->assertEquals($expect, $actual);
    }

    /**
     * @return void
     */
    public function test_script_with_multiple_methods()
    {
        $expect = 'let data = {"error":{},"name":"John Doe","age":30,"loading":false};';

        $script = new Script('data');

        $script->withError()
            ->with('name', 'John Doe')
            ->with('age', 30)
            ->withLoading();

        $actual = $script->__toString();

        $this->assertEquals($expect, $actual);
    }
}
