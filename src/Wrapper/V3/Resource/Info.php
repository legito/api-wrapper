<?php

namespace Legito\Api\Wrapper\V3\Resource;


/**
 * Class Info
 * @package Legito\Api\Wrapper\V3\Resource
 * @author Marek Skopal, Legito s.r.o.
 * @license MIT
 */
class Info extends AbstractResource
{
    protected const RESOURCE = '/info';

    /**
     * Returns version
     * @return \stdClass
     * @throws \RestClientException
     */
    public function getInfo(): \stdClass
    {
        $result = $this->client->get(self::RESOURCE);

        return $this->processResponse($result);
    }
}