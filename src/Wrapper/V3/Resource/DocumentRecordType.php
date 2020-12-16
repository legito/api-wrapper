<?php

namespace Legito\Api\Wrapper\V3\Resource;


/**
 * Class DocumentRecordType
 * @package Legito\Api\Wrapper\V3\Resource
 * @author Marek Skopal, Legito s.r.o.
 * @license MIT
 */
class DocumentRecordType extends AbstractResource
{
    protected const RESOURCE = '/document-record-type';

    /**
     * Returns document record type list
     * @return array
     * @throws \RestClientException
     */
    public function getDocumentRecordType(): array
    {
        $result = $this->client->get(self::RESOURCE);

        return $this->processResponse($result);
    }

    /**
     * Inserts document record type
     * @param mixed $data
     * @return \stdClass
     * @throws \RestClientException
     */
    public function postDocumentRecordType($data = NULL): \stdClass
    {
        $result = $this->client->post(
            self::RESOURCE,
            [],
            $data
        );

        return $this->processResponse($result);
    }

    /**
     * Updates document record type
     * @param int $documentRecordTypeId
     * @param mixed $data
     * @return \stdClass
     * @throws \RestClientException
     */
    public function putDocumentRecordType(int $documentRecordTypeId, $data = NULL): \stdClass
    {
        $result = $this->client->put(
            self::RESOURCE,
            [
                'documentRecordTypeId' => $documentRecordTypeId
            ],
            $data
        );

        return $this->processResponse($result);
    }

    /**
     * Deletes document record type
     * @param int $documentRecordTypeId
     * @return \stdClass
     * @throws \RestClientException
     */
    public function deleteDocumentRecordType(int $documentRecordTypeId): \stdClass
    {
        $result = $this->client->delete(
            self::RESOURCE,
            [
                'labelId' => $documentRecordTypeId,
            ]
        );

        return $this->processResponse($result);
    }
}