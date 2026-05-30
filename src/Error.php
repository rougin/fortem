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
    protected $styling = null;

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

        $class = $this->getStyling()->error();

        $html .= '<p class="' . $class . '" x-text="' . $field . '"></p>';

        return $html . '</template>';
    }

    /**
     * @return \Rougin\Fortem\StyleInterface
     */
    public function getStyling()
    {
        if ($this->styling instanceof StyleInterface)
        {
            return $this->styling;
        }

        return new BootstrapStyle;
    }

    /**
     * @param \Rougin\Fortem\StyleInterface $styling
     *
     * @return self
     */
    public function setStyling(StyleInterface $styling)
    {
        $this->styling = $styling;

        return $this;
    }
}
