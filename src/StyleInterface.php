<?php

namespace Rougin\Fortem;

/**
 * @package Fortem
 *
 * @author Rougin Gutib <rougingutib@gmail.com>
 */
interface StyleInterface
{
    /**
     * @return string
     */
    public function error();

    /**
     * @return string
     */
    public function required();
}
