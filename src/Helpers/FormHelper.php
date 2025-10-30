<?php

namespace Rougin\Fortem\Helpers;

use Rougin\Fortem\Button;
use Rougin\Fortem\Error;
use Rougin\Fortem\Input;
use Rougin\Fortem\Label;
use Rougin\Fortem\Script;
use Rougin\Fortem\Select;
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
     * @param string      $text
     * @param string|null $class
     *
     * @return \Rougin\Fortem\Button
     */
    public function button($text, $class = null)
    {
        $elem = new Button($text);

        if ($class)
        {
            $elem->withClass($class);
        }

        return $elem;
    }

    /**
     * NOTE: This is a specific code for "alpinejs".
     *
     * @param string  $field
     * @param boolean $first
     *
     * @return \Rougin\Fortem\Error
     */
    public function error($field, $first = false)
    {
        return new Error($field, $first);
    }

    /**
     * @param string      $name
     * @param string|null $class
     *
     * @return \Rougin\Fortem\Input
     */
    public function input($name, $class = null)
    {
        $elem = new Input($name);

        if ($class)
        {
            $elem->withClass($class);
        }

        return $elem;
    }

    /**
     * @param string      $text
     * @param string|null $class
     *
     * @return \Rougin\Fortem\Label
     */
    public function label($text, $class = null)
    {
        $elem = new Label($text);

        if ($class)
        {
            $elem->withClass($class);
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
        return new Script($name);
    }

    /**
     * @param string      $name
     * @param mixed[]     $items
     * @param string|null $class
     *
     * @return \Rougin\Fortem\Select
     */
    public function select($name, $items = array(), $class = null)
    {
        $elem = new Select($name);

        if ($class)
        {
            $elem->withClass($class);
        }

        $parsed = array();

        foreach ($items as $index => $item)
        {
            if (is_array($item) && array_key_exists('value', $item))
            {
                $parsed[] = $item;

                continue;
            }

            $parsed[] = array('value' => $index, 'label' => $item);
        }

        /** @var array<string, string>[] $parsed */
        return $elem->withItems($parsed);
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
