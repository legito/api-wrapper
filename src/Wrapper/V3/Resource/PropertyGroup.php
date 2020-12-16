<?php

namespace Legito\Api\Wrapper\V3\Resource;


/**
 * Class PropertyGroup
 * @package Legito\Api\Wrapper\V3\Resource
 * @author Marek Skopal, Legito s.r.o.
 * @license MIT
 */
class PropertyGroup extends AbstractResource
{
    protected const RESOURCE = '/property-group';

    /**
     * Returns property group list
     * @return array
     * @throws \RestClientException
     */
    public function getPropertyGroup(): array
    {
        $result = $this->client->get(self::RESOURCE);

        return $this->processResponse($result);
    }
}