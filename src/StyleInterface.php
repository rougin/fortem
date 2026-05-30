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
    public function button();

    /**
     * @return string
     */
    public function error();

    /**
     * @return string
     */
    public function input();

    /**
     * @return string
     */
    public function label();

    /**
     * @return string
     */
    public function required();

    /**
     * @return string
     */
    public function select();
}
