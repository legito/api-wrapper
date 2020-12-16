<?php

namespace Legito\Api\Wrapper\V3\Resource;


/**
 * Class Property
 * @package Legito\Api\Wrapper\V3\Resource
 * @author Marek Skopal, Legito s.r.o.
 * @license MIT
 */
class Property extends AbstractResource
{
    protected const RESOURCE = '/property';

    /**
     * Returns property list
     * @return array
     * @throws \RestClientException
     */
    public function getProperty(): array
    {
        $result = $this->client->get(self::RESOURCE);

        return $this->processResponse($result);
    }
}