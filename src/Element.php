<?php

namespace Rougin\Fortem;

use Rougin\Fortem\Styles\BootstrapStyle;

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
     * @var array<string, string>
     */
    protected $attrs = array();

    /**
     * @var boolean
     */
    protected $noStyling = false;

    /**
     * @var \Rougin\Fortem\StyleInterface|null
     */
    protected $styling = null;

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
        $default = $this->getDefaultClass();

        if ($this->noStyling || $default === '')
        {
            return $this->buildAttrs();
        }

        if (array_key_exists('class', $this->attrs))
        {
            $default .= ' ' . $this->attrs['class'];

            $this->attrs['class'] = $default;

            return $this->buildAttrs();
        }

        $this->pushClass($default);

        return $this->buildAttrs();
    }

    /**
     * @return string
     */
    public function getDefaultClass()
    {
        return '';
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
     * @return static
     */
    public function noStyling()
    {
        $this->noStyling = true;

        return $this;
    }

    /**
     * @param \Rougin\Fortem\StyleInterface $styling
     *
     * @return static
     */
    public function setStyling(StyleInterface $styling)
    {
        $this->styling = $styling;

        return $this;
    }

    /**
     * @param string $key
     * @param string $value
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

    /**
     * @return string
     */
    protected function buildAttrs()
    {
        $items = array();

        foreach ($this->attrs as $key => $value)
        {
            $items[] = $key . '="' . $value . '"';
        }

        return implode(' ', $items);
    }

    /**
     * @return string|null
     */
    protected function getClassAnchor()
    {
        if (array_key_exists('name', $this->attrs))
        {
            return 'name';
        }

        if (array_key_exists('type', $this->attrs))
        {
            return 'type';
        }

        return null;
    }

    /**
     * @param string $default
     *
     * @return void
     */
    protected function pushClass($default)
    {
        $anchor = $this->getClassAnchor();

        $result = array();

        $inserted = false;

        foreach ($this->attrs as $key => $value)
        {
            $result[$key] = $value;

            if ($key === $anchor)
            {
                $result['class'] = $default;

                $inserted = true;
            }
        }

        if (! $inserted)
        {
            $result['class'] = $default;
        }

        $this->attrs = $result;
    }
}
