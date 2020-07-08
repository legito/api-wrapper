<?php

namespace Legito\Api\Wrapper\V2\Resource;


/**
 * Class Currency
 * @package Legito\Api\Wrapper\V2\Resource
 * @author Marek Skopal, Legito s.r.o.
 * @license MIT
 */
class Currency extends AbstractResource
{
    protected const RESOURCE = '/currency';

    /**
     * Returns currency list
     * @return array
     * @throws \RestClientException
     */
    public function getCurrency(): array
    {
        $result = $this->client->get(self::RESOURCE);

        return $this->processResponse($result);
    }
}