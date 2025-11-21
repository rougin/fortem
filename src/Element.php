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
     * @var boolean
     */
    protected $alpine = false;

    /**
     * @var array<string, mixed>
     */
    protected $attrs = array();

    /**
     * @param string $name
     *
     * @return static
     */
    public function disablesOn($name)
    {
        if (! $this->alpine)
        {
            throw new \Exception('"alpinejs" disabled');
        }

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
     * @param boolean $alpine
     *
     * @return static
     */
    public function withAlpine($alpine = true)
    {
        $this->alpine = $alpine;

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
