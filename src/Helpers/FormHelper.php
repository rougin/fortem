<?php

namespace Rougin\Fortem\Helpers;

use Rougin\Fortem\Button;
use Rougin\Fortem\Error;
use Rougin\Fortem\Input;
use Rougin\Fortem\Label;
use Rougin\Fortem\Script;
use Rougin\Fortem\Select;
use Rougin\Fortem\StyleInterface;
use Staticka\Helper\HelperInterface;

/**
 * @package Fortem
 *
 * @author Rougin Gutib <rougingutib@gmail.com>
 */
class FormHelper implements HelperInterface
{
    /**
     * @var boolean
     */
    protected $alpine = false;

    /**
     * @var \Rougin\Fortem\StyleInterface|null
     */
    protected $style = null;

    /**
     * @param string $text
     *
     * @return \Rougin\Fortem\Button
     */
    public function button($text)
    {
        $elem = new Button($text);

        $elem->withAlpine($this->alpine);

        return $elem;
    }

    /**
     * @param string  $field
     * @param boolean $first
     *
     * @return \Rougin\Fortem\Error
     */
    public function error($field, $first = false)
    {
        if (! $this->alpine)
        {
            throw new \Exception('"alpinejs" disabled');
        }

        $elem = new Error($field, $first);

        if ($this->style instanceof StyleInterface)
        {
            $elem->setStyle($this->style);
        }

        return $elem;
    }

    /**
     * @param string $name
     *
     * @return \Rougin\Fortem\Input
     */
    public function input($name)
    {
        $elem = new Input($name);

        $elem->withAlpine($this->alpine);

        return $elem;
    }

    /**
     * @param string $text
     *
     * @return \Rougin\Fortem\Label
     */
    public function label($text)
    {
        $elem = new Label($text);

        if ($this->style instanceof StyleInterface)
        {
            $elem->setStyle($this->style);
        }

        return $elem;
    }

    /**
     * Returns the name of the helper.
     *
     * @return string
     */
    public function name()
    {
        return 'form';
    }

    /**
     * @return self
     */
    public function noAlpine()
    {
        $this->alpine = false;

        return $this;
    }

    /**
     * @param string $name
     *
     * @return \Rougin\Fortem\Script
     */
    public function script($name)
    {
        if (! $this->alpine)
        {
            throw new \Exception('"alpinejs" disabled');
        }

        return new Script($name);
    }

    /**
     * @param string  $name
     * @param mixed[] $items
     *
     * @return \Rougin\Fortem\Select
     */
    public function select($name, $items = array())
    {
        $elem = new Select($name);

        $elem->withAlpine($this->alpine);

        $parsed = array();

        foreach ($items as $index => $item)
        {
            $label = $item;

            $value = $index;

            if (is_array($item) && array_key_exists('value', $item))
            {
                $parsed[] = $item;

                continue;
            }

            $parsed[] = compact('value', 'label');
        }

        return $elem->withItems($parsed);
    }

    /**
     * @param \Rougin\Fortem\StyleInterface $style
     *
     * @return self
     */
    public function useStyle(StyleInterface $style)
    {
        $this->style = $style;

        return $this;
    }

    /**
     * @return self
     */
    public function withAlpine()
    {
        $this->alpine = true;

        return $this;
    }
}
