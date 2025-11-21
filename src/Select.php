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
     * @var string
     */
    protected $placeholder = 'Please select';

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

        $text = $this->placeholder;

        $html .= '<option value="">' . $text . '</option>';

        foreach ($this->items as $item)
        {
            $html .= '<option value="' . $item['value'] . '">' . $item['label'] . '</option>';
        }

        return $html . '</select>';
    }

    /**
     * @return self
     */
    public function asModel()
    {
        if (! $this->alpine)
        {
            throw new \Exception('"alpinejs" disabled');
        }

        $name = $this->attrs['name'];

        return $this->with('x-model', $name);
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

    /**
     * @param string $text
     *
     * @return self
     */
    public function withPlaceholder($text)
    {
        $this->placeholder = $text;

        return $this;
    }
}
