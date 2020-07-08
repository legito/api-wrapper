<?php

namespace Legito\Api;

use Legito\Api\Wrapper\V1\Wrapper;

/**
 * Class Legito
 * @package Legito\Api\Wrapper
 * @author Marek Skopal, Legito s.r.o.
 * @license MIT
 */
class Legito
{
    /** @var Wrapper */
    private $wrapper;

    /** @var string */
    private $apiKey;

    /** @var string */
    private $privateKey;

    /** @var string|null */
    private $url;

    /**
     * Legito constructor.
     * @param string $apiKey
     * @param string $privateKey
     * @param string|null $url
     */
    public function __construct(string $apiKey, string $privateKey, ?string $url = NULL)
    {
        $this->apiKey = $apiKey;
        $this->privateKey = $privateKey;
        $this->url = $url;
    }

    /**
     * Returns last version wrapper
     * @return \Legito\Api\Wrapper\V2\Wrapper
     */
    public function getWrapper(): \Legito\Api\Wrapper\V2\Wrapper
    {
        return $this->getWrapperV2();
    }

    /**
     * Returns wrapper version v1
     * @return  \Legito\Api\Wrapper\V1\Wrapper
     */
    public function getWrapperV1(): \Legito\Api\Wrapper\V1\Wrapper
    {
        if (!($this->wrapper instanceof \Legito\Api\Wrapper\V1\Wrapper)) {
            $this->wrapper = new \Legito\Api\Wrapper\V1\Wrapper($this->apiKey, $this->privateKey, $this->url);
        }

        return $this->wrapper;
    }

    /**
     * Returns wrapper version v2
     * @return \Legito\Api\Wrapper\V2\Wrapper
     */
    public function getWrapperV2(): \Legito\Api\Wrapper\V2\Wrapper
    {
        if (!($this->wrapper instanceof \Legito\Api\Wrapper\V2\Wrapper)) {
            $this->wrapper = new \Legito\Api\Wrapper\V2\Wrapper($this->apiKey, $this->privateKey, $this->url);
        }

        return $this->wrapper;
    }
}
