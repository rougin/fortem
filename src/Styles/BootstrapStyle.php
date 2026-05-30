<?php

namespace Rougin\Fortem\Styles;

use Rougin\Fortem\StyleInterface;

/**
 * @package Fortem
 *
 * @author Rougin Gutib <rougingutib@gmail.com>
 */
class BootstrapStyle implements StyleInterface
{
    /**
     * @return string
     */
    public function error()
    {
        return 'text-danger small mb-0';
    }

    /**
     * @return string
     */
    public function required()
    {
        return 'text-danger';
    }
}
