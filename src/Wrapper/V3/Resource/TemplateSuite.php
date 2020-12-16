<?php

namespace Legito\Api\Wrapper\V3\Resource;


/**
 * Class TemplateSuite
 * @package Legito\Api\Wrapper\V3\Resource
 * @author Marek Skopal, Legito s.r.o.
 * @license MIT
 */
class TemplateSuite extends AbstractResource
{
    protected const RESOURCE = '/template-suite';

    /**
     * Returns template suite list
     * @return array
     * @throws \RestClientException
     */
    public function getTemplateSuite(): array
    {
        $result = $this->client->get(self::RESOURCE);

        return $this->processResponse($result);
    }
}