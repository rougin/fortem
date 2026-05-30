<?php

namespace Rougin\Fortem;

use Rougin\Fortem\Styles\BootstrapStyle;

/**
 * [NOTE] This is a specific code for "alpinejs".
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
     * @var \Rougin\Fortem\StyleInterface|null
     */
    protected $style = null;

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

        $class = $this->getStyle()->error();

        $html .= '<p class="' . $class . '" x-text="' . $field . '"></p>';

        return $html . '</template>';
    }

    /**
     * @return \Rougin\Fortem\StyleInterface
     */
    public function getStyle()
    {
        if ($this->style instanceof StyleInterface)
        {
            return $this->style;
        }

        return new BootstrapStyle;
    }

    /**
     * @param \Rougin\Fortem\StyleInterface $style
     *
     * @return self
     */
    public function setStyle(StyleInterface $style)
    {
        $this->style = $style;

        return $this;
    }
}
