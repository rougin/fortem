<?php

namespace Rougin\Fortem;

use Rougin\Fortem\Styles\BootstrapStyle;

/**
 * @package Fortem
 *
 * @author Rougin Gutib <rougingutib@gmail.com>
 */
class Label extends Element
{
    /**
     * @var boolean
     */
    protected $required = false;

    /**
     * @var \Rougin\Fortem\StyleInterface|null
     */
    protected $style = null;

    /**
     * @var string
     */
    protected $text;

    /**
     * @param string $text
     */
    public function __construct($text)
    {
        $this->text = $text;
    }

    /**
     * @return string
     */
    public function __toString()
    {
        $attrs = $this->getAttrs();

        $text = $this->text;

        $class = $this->getStyle()->required();

        if ($this->required)
        {
            $text .= ' <span class="' . $class . '">*</span>';
        }

        $attrs = $attrs ? ' ' . $attrs : '';

        return '<label' . $attrs . '>' . $text . '</label>';
    }

    /**
     * @return self
     */
    public function asRequired()
    {
        $this->required = true;

        return $this;
    }

    /**
     * @param string $name
     *
     * @return self
     */
    public function forField($name)
    {
        return $this->with('for', $name);
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

    /**
     * @param string $type
     *
     * @return self
     */
    public function withType($type)
    {
        return $this->with('type', $type);
    }
}
