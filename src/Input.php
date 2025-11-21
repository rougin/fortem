<?php

namespace Rougin\Fortem;

/**
 * @package Fortem
 *
 * @author Rougin Gutib <rougingutib@gmail.com>
 */
class Input extends Element
{
    /**
     * @param string $name
     */
    public function __construct($name)
    {
        $this->withType('text');

        $this->withName($name);
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return '<input ' . $this->getAttrs() . '>';
    }

    /**
     * @return self
     */
    public function asEmail()
    {
        return $this->withType('email');
    }

    /**
     * @return self
     */
    public function asNumber()
    {
        return $this->withType('number');
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
     * @param string $name
     *
     * @return self
     */
    public function withName($name)
    {
        return $this->with('name', $name);
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
