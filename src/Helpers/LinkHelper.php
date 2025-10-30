<?php

namespace Rougin\Fortem\Helpers;

/**
 * @package Fortem
 *
 * @author Rougin Gutib <rougingutib@gmail.com>
 */
class LinkHelper
{
    /**
     * @var string|null
     */
    protected $base = null;

    /**
     * @var array<string, string>
     */
    protected $server = array();

    /**
     * @param array<string, string> $server
     */
    public function __construct($server = array())
    {
        $this->server = $server;
    }

    /**
     * @return string
     */
    public function getCurrent()
    {
        $uri = '';

        if (array_key_exists('REQUEST_URI', $this->server))
        {
            $uri = $this->server['REQUEST_URI'];
        }

        return $this->getBase() . $uri;
    }

    /**
     * @param string $link
     *
     * @return boolean
     */
    public function isCurrent($link)
    {
        $isMain = $link === '/';

        $link = $this->set($link);

        $current = $this->getCurrent();

        if (! $isMain)
        {
            return strpos($current, $link) !== false;
        }

        return $current === $link;
    }

    /**
     * @param string $link
     *
     * @return string
     */
    public function set($link)
    {
        $link = $link[0] !== '/' ? '/' . $link : $link;

        return $this->getBase() . $link;
    }

    /**
     * @param string $base
     * @return self
     */
    public function setBase($base)
    {
        $this->base = $base;

        return $this;
    }

    /**
     * @return string
     */
    protected function getBase()
    {
        $base = '://';

        if ($this->base)
        {
            $this->server['HTTP_HOST'] = $this->base;
        }

        if (array_key_exists('HTTP_HOST', $this->server))
        {
            $base .= $this->server['HTTP_HOST'];
        }

        $exists = array_key_exists('HTTPS', $this->server);

        return ($exists ? 'https' : 'http') . $base;
    }
}
