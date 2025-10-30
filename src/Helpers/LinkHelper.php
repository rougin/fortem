<?php

namespace Rougin\Fortem\Helpers;

use Staticka\Helper\HelperInterface;

/**
 * @package Fortem
 *
 * @author Rougin Gutib <rougingutib@gmail.com>
 */
class LinkHelper implements HelperInterface
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
    public function __toString()
    {
        $uri = '';

        if ($this->exists('REQUEST_URI'))
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
    public function isActive($link)
    {
        $url = $this->__toString();

        $isMain = $link === '/';

        $link = $this->set($link);

        if (! $isMain)
        {
            return strpos($url, $link) !== false;
        }

        return $url === $link;
    }

    /**
     * Returns the name of the helper.
     *
     * @return string
     */
    public function name()
    {
        return 'url';
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
     *
     * @return self
     */
    public function setBase($base)
    {
        $this->base = $base;

        return $this;
    }

    /**
     * @param string $key
     *
     * @return boolean
     */
    protected function exists($key)
    {
        return array_key_exists($key, $this->server);
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

        if ($this->exists('HTTP_HOST'))
        {
            $base .= $this->server['HTTP_HOST'];
        }

        $exists = $this->exists('HTTPS');

        return ($exists ? 'https' : 'http') . $base;
    }
}
