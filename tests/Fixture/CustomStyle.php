<?php

namespace Rougin\Fortem\Fixture;

use Rougin\Fortem\StyleInterface;

/**
 * @package Fortem
 *
 * @author Rougin Gutib <rougingutib@gmail.com>
 */
class CustomStyle implements StyleInterface
{
    /**
     * @return string
     */
    public function button()
    {
        return 'foo-btn';
    }

    /**
     * @return string
     */
    public function error()
    {
        return 'foo-error';
    }

    /**
     * @return string
     */
    public function input()
    {
        return 'foo-input';
    }

    /**
     * @return string
     */
    public function label()
    {
        return 'foo-label';
    }

    /**
     * @return string
     */
    public function required()
    {
        return 'foo-required';
    }

    /**
     * @return string
     */
    public function select()
    {
        return 'foo-select';
    }
}
