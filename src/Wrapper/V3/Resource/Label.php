<?php

namespace Legito\Api\Wrapper\V3\Resource;


/**
 * Class Label
 * @package Legito\Api\Wrapper\V3\Resource
 * @author Marek Skopal, Legito s.r.o.
 * @license MIT
 */
class Label extends AbstractResource
{
    protected const RESOURCE = '/label';

    /**
     * Returns label list
     * @return array
     * @throws \RestClientException
     */
    public function getLabel(): array
    {
        $result = $this->client->get(self::RESOURCE);

        return $this->processResponse($result);
    }

    /**
     * Post label
     * @param mixed $data
     * @return \stdClass
     * @throws \RestClientException
     */
    public function postLabel($data = NULL): \stdClass
    {
        $result = $this->client->post(
            self::RESOURCE,
            [],
            $data
        );

        return $this->processResponse($result);
    }

    /**
     * Deletes label
     * @param int $labelId
     * @return \stdClass
     * @throws \RestClientException
     */
    public function deleteLabel(int $labelId): \stdClass
    {
        $result = $this->client->delete(
            self::RESOURCE,
            [
                'labelId' => $labelId,
            ]
        );

        return $this->processResponse($result);
    }
}