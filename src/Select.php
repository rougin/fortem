<?php

namespace Rougin\Fortem;

/**
 * @package Fortem
 *
 * @author Rougin Gutib <rougingutib@gmail.com>
 */
class Select extends Element
{
    /**
     * @var array<string, mixed>[]
     */
    protected $items = array();

    /**
     * @param string $name
     */
    public function __construct($name)
    {
        $this->withName($name);
    }

    /**
     * @return string
     */
    public function __toString()
    {
        $html = '<select ' . $this->getAttrs() . '>';

        $html .= '<option value="">Please select</option>';

        foreach ($this->items as $item)
        {
            $html .= '<option value="' . $item['value'] . '">' . $item['label'] . '</option>';
        }

        return $html . '</select>';
    }

    /**
     * NOTE: This is a specific code for "alpinejs".
     *
     * @param string|null $name
     *
     * @return self
     */
    public function asModel($name = null)
    {
        return $this->with('x-model', $name ? $name : $this->attrs['name']);
    }

    /**
     * @param array<string, mixed>[] $items
     *
     * @return self
     */
    public function withItems($items)
    {
        $this->items = $items;

        return $this;
    }

    /**
     * @param string $name
     *
     * @return self
     */
    public function withName($name)
    {
        return $this->with('name', $name);
    }
}
