<?php

namespace Legito\Api\Wrapper\V2\Resource;


/**
 * Class Timezone
 * @package Legito\Api\Wrapper\V2\Resource
 * @author Marek Skopal, Legito s.r.o.
 * @license MIT
 */
class Timezone extends AbstractResource
{
    protected const RESOURCE = '/timezone';

    /**
     * Returns timezone list
     * @return array
     * @throws \RestClientException
     */
    public function getTimezone(): array
    {
        $result = $this->client->get(self::RESOURCE);

        return $this->processResponse($result);
    }
}