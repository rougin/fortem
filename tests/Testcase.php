<?php

namespace Rougin\Fortem;

use LegacyPHPUnit\TestCase as Legacy;

/**
 * @package Fortem
 *
 * @author Rougin Gutib <rougingutib@gmail.com>
 */
class Testcase extends Legacy
{
    /**
     * @param class-string<\Throwable> $exception
     *
     * @return void
     */
    public function doExpectException($exception)
    {
        if (method_exists($this, 'expectException'))
        {
            $this->expectException($exception);

            return;
        }

        /** @phpstan-ignore-next-line */
        $this->setExpectedException($exception);
    }
}
