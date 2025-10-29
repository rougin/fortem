<?php

namespace Rougin\Fortem;

/**
 * @package Fortem
 *
 * @author Rougin Gutib <rougingutib@gmail.com>
 */
class Element
{
    /**
     * @var array<string, mixed>
     */
    protected $attrs = array();

    /**
     * NOTE: This is a specific code for "alpinejs".
     *
     * @param string $name
     *
     * @return static
     */
    public function disablesOn($name)
    {
        return $this->with(':disabled', $name);
    }

    /**
     * @return string
     */
    public function getAttrs()
    {
        $items = array();

        foreach ($this->attrs as $key => $value)
        {
            $items[] = $key . '="' . $value . '"';
        }

        return implode(' ', $items);
    }

    /**
     * @param string $key
     * @param mixed  $value
     *
     * @return static
     */
    public function with($key, $value)
    {
        $this->attrs[$key] = $value;

        return $this;
    }

    /**
     * @param string $class
     *
     * @return static
     */
    public function withClass($class)
    {
        return $this->with('class', $class);
    }

    /**
     * @param string $id
     *
     * @return static
     */
    public function withId($id)
    {
        return $this->with('id', $id);
    }
}
