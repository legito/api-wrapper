<?php

namespace Legito\Api\Wrapper\V2\Resource;


/**
 * Class User
 * @package Legito\Api\Wrapper\V2\Resource
 * @author Marek Skopal, Legito s.r.o.
 * @license MIT
 */
class User extends AbstractResource
{
    protected const RESOURCE = '/user';

    protected const RELATION_PERMISSION = '/permission';

    /**
     * Returns user list
     * @param array|null $id
     * @param array|null $email
     * @param int|null $limit
     * @param int|null $offset
     * @return array
     * @throws \Legito\Api\Wrapper\Exception\NotFoundException
     */
    public function getUser(
        ?array $id = NULL,
        ?array $email = NULL,
        ?int $limit = NULL,
        ?int $offset = NULL
    ): array {
        $result = $this->client->get(
            self::RESOURCE,
            [],
            [
                'id' => $id,
                'email' => $email,
                'limit' => $limit,
                'offset' => $offset,
            ]
        );

        return $this->processResponse($result);
    }

    /**
     * Posts user
     * @param array|NULL $data
     * @return \stdClass
     * @throws \RestClientException
     */
    public function postUser($data = NULL): \stdClass
    {
        $result = $this->client->post(
            self::RESOURCE,
            [],
            $data
        );

        return $this->processResponse($result);
    }

    /**
     * Puts user
     * @param string $idEmail
     * @param array|NULL $data
     * @return \stdClass
     * @throws \RestClientException
     */
    public function putUser(string $idEmail, $data = NULL): \stdClass
    {
        $result = $this->client->put(
            self::RESOURCE,
            [
                'id' => $idEmail
            ],
            $data
        );

        return $this->processResponse($result);
    }

    /**
     * Deletes user
     * @param string $idEmail
     * @return \stdClass
     * @throws \RestClientException
     */
    public function deleteUser(string $idEmail): \stdClass
    {
        $result = $this->client->delete(
            self::RESOURCE,
            [
                'id' => $idEmail
            ]
        );

        return $this->processResponse($result);
    }

    /**
     * Posts user permission
     * @param string $idEmail
     * @param array|NULL $data
     * @return \stdClass
     * @throws \RestClientException
     */
    public function putUserPermission(string $idEmail, $data = NULL): \stdClass
    {
        $result = $this->client->put(
            self::RESOURCE . self::RELATION_PERMISSION,
            [
                'id' => $idEmail
            ],
            $data
        );

        return $this->processResponse($result);
    }
}