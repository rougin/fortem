<?php

namespace Rougin\Fortem;

/**
 * NOTE: This is a specific code for "alpinejs".
 *
 * @package Fortem
 *
 * @author Rougin Gutib <rougingutib@gmail.com>
 */
class Error
{
    /**
     * @var string
     */
    protected $field;

    /**
     * @var boolean
     */
    protected $first;

    /**
     * @param string  $field
     * @param boolean $first
     */
    public function __construct($field, $first = false)
    {
        $this->field = $field;

        $this->first = $first;
    }

    /**
     * @return string
     */
    public function __toString()
    {
        $html = '<template x-if="' . $this->field . '">';

        $field = $this->field;

        if (! $this->first)
        {
            $field = $this->field . '[0]';
        }

        // TODO: Use "StyleInterface" ----
        $class = 'text-danger small mb-0';
        // -------------------------------

        $html .= '<p class="' . $class . '" x-text="' . $field . '"></p>';

        return $html . '</template>';
    }
}
