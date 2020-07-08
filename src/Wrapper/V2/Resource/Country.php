<?php

namespace Legito\Api\Wrapper\V2\Resource;


/**
 * Class Country
 * @package Legito\Api\Wrapper\V2\Resource
 * @author Marek Skopal, Legito s.r.o.
 * @license MIT
 */
class Country extends AbstractResource
{
    protected const RESOURCE = '/country';

    /**
     * Returns country list
     * @return array
     * @throws \RestClientException
     */
    public function getCountry(): array
    {
        $result = $this->client->get(self::RESOURCE);

        return $this->processResponse($result);
    }
}