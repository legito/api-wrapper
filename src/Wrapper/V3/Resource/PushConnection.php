<?php

namespace Legito\Api\Wrapper\V3\Resource;


/**
 * Class PushConnection
 * @package Legito\Api\Wrapper\V3\Resource
 * @author Marek Skopal, Legito s.r.o.
 * @license MIT
 */
class PushConnection extends AbstractResource
{
    protected const RESOURCE = '/push-connection';

    /**
     * Returns push connection list
     * @return array
     * @throws \RestClientException
     */
    public function getPushConnection(): array
    {
        $result = $this->client->get(self::RESOURCE);

        return $this->processResponse($result);
    }

    /**
     * Creates new push connection
     * @param mixed $data
     * @return \stdClass
     * @throws \RestClientException
     */
    public function postPushConnection($data = NULL): \stdClass
    {
        $result = $this->client->post(
            self::RESOURCE,
            [],
            $data
        );

        return $this->processResponse($result);
    }
}