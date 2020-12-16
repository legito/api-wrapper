<?php

namespace Legito\Api\Wrapper\V3\Resource;


/**
 * Class File
 * @package Legito\Api\Wrapper\V3\Resource
 * @author Marek Skopal, Legito s.r.o.
 * @license MIT
 */
class File extends AbstractResource
{
    protected const RESOURCE = '/file';

    protected const RELATION_DOWNLOAD = '/download';

    /**
     * Returns files related to Document Record
     * @param string $documentRecordCode
     * @return array
     * @throws \RestClientException
     */
    public function getFile(string $documentRecordCode): array
    {
        $result = $this->client->get(
            self::RESOURCE,
            [
                'documentRecordCode' => $documentRecordCode
            ]
        );

        return $this->processResponse($result);
    }

    /**
     * Uploads external file into Document Record
     * @param string $documentRecordCode
     * @param array $fileData ["fileName" => "example_file.pdf", "data" => base64_encode($fileContents)]
     * @return \stdClass
     * @throws \Legito\Api\Wrapper\Exception\NotFoundException
     */
    public function postFile(string $documentRecordCode, array $fileData): \stdClass
    {
        $result = $this->client->post(
            self::RESOURCE,
            [
                'documentRecordCode' => $documentRecordCode
            ],
            $fileData
        );

        return $this->processResponse($result);
    }

    /**
     * Removes external file from Document Record
     * @param int $fileId
     * @return \stdClass
     * @throws \Legito\Api\Wrapper\Exception\NotFoundException
     */
    public function deleteFile(int $fileId): \stdClass
    {
        $result = $this->client->delete(
            self::RESOURCE,
            [
                'fileId' => $fileId
            ]
        );

        return $this->processResponse($result);
    }

    /**
     * Downloads external file
     * @param int $fileId
     * @return \stdClass
     * @throws \Legito\Api\Wrapper\Exception\NotFoundException
     */
    public function getFileDownload(int $fileId): \stdClass
    {
        $result = $this->client->get(
            self::RESOURCE . self::RELATION_DOWNLOAD,
            [
                'fileId' => $fileId
            ]
        );

        return $this->processResponse($result);
    }
}
