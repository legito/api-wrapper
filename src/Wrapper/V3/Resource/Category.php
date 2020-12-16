<?php

namespace Legito\Api\Wrapper\V3\Resource;


/**
 * Class Category
 * @package Legito\Api\Wrapper\V3\Resource
 * @author Marek Skopal, Legito s.r.o.
 * @license MIT
 */
class Category extends AbstractResource
{
    protected const RESOURCE = '/document-record-group';

    /**
     * Returnscategory list
     * @return array
     * @throws \RestClientException
     */
    public function getCategory(): array
    {
        $result = $this->client->get(self::RESOURCE);

        return $this->processResponse($result);
    }
}