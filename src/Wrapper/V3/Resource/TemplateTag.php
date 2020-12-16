<?php

namespace Legito\Api\Wrapper\V3\Resource;


/**
 * Class TemplateTag
 * @package Legito\Api\Wrapper\V3\Resource
 * @author Marek Skopal, Legito s.r.o.
 * @license MIT
 */
class TemplateTag extends AbstractResource
{
    protected const RESOURCE = '/template-tag';

    /**
     * Returns template tag list
     * @return array
     * @throws \RestClientException
     */
    public function getTemplateTag(): array
    {
        $result = $this->client->get(self::RESOURCE);

        return $this->processResponse($result);
    }

    /**
     * Post template tag
     * @param mixed $data
     * @return \stdClass
     * @throws \RestClientException
     */
    public function postTemplateTag($data = NULL): \stdClass
    {
        $result = $this->client->post(
            self::RESOURCE,
            [],
            $data
        );

        return $this->processResponse($result);
    }
}