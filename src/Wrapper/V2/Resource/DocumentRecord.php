<?php

namespace Legito\Api\Wrapper\V2\Resource;


/**
 * Class DocumentRecord
 * @package Legito\Api\Wrapper\V2\Resource
 * @author Marek Skopal, Legito s.r.o.
 * @license MIT
 */
class DocumentRecord extends AbstractResource
{
    public const ANONYMIZE_FIELD_MONEY = 'money';
    public const ANONYMIZE_FIELD_CLAUSES = 'clauses';
    public const ANONYMIZE_FIELD_DATE = 'date';
    public const ANONYMIZE_FIELD_TEXTFIELD = 'textfield';
    public const ANONYMIZE_FIELD_PARAGRAPHS = 'paragraphs';

    protected const RESOURCE = '/document-record';

    protected const RELATION_ANONYMIZE = '/anonymize';

    /**
     * Returns document record list
     * @param int[]|null $id
     * @param string[]|null $code
     * @param int|null $limit Min limit is 0; Max limit is 1000
     * @param int|null $offset
     * @param int[]|null $templateSuiteId
     * @param bool|null $deleted
     * @return array
     * @throws \RestClientException
     */
    public function getDocumentRecord(
        ?array $id = NULL,
        ?array $code = NULL,
        ?int $limit = NULL,
        ?int $offset = NULL,
        ?array $templateSuiteId = NULL,
        ?bool $deleted = NULL
    ): array {
        $result = $this->client->get(
            self::RESOURCE,
            [],
            [
                'id' => $id,
                'code' => $code,
                'limit' => $limit,
                'offset' => $offset,
                'templateSuiteId' => $templateSuiteId,
                'deleted' => (int) $deleted
            ]
        );

        return $this->processResponse($result);
    }

    /**
     * Puts document record
     * @param string $code
     * @param mixed $data
     * @return \stdClass
     * @throws \RestClientException
     */
    public function putDocumentRecord(string $code, $data = NULL): \stdClass
    {
        $result = $this->client->put(
            self::RESOURCE,
            [
                'code' => $code
            ],
            $data
        );

        return $this->processResponse($result);
    }

    /**
     * Deletes document record
     * @param string $code
     * @return \stdClass
     * @throws \RestClientException
     */
    public function deleteDocumentRecord(string $code): \stdClass
    {
        $result = $this->client->delete(
            self::RESOURCE,
            [
                'code' => $code,
            ]
        );

        return $this->processResponse($result);
    }

    /**
     * Anonymize document record
     * @param string $code
     * @param array|string[] $fields
     * @return \stdClass
     */
    public function getAnonymizeDocumentRecord(
        string $code,
        array $fields = [self::ANONYMIZE_FIELD_MONEY, self::ANONYMIZE_FIELD_CLAUSES, self::ANONYMIZE_FIELD_DATE, self::ANONYMIZE_FIELD_TEXTFIELD, self::ANONYMIZE_FIELD_PARAGRAPHS]
    ): \stdClass {
        $result = $this->client->get(
            self::RESOURCE . self::RELATION_ANONYMIZE,
            [
                'code' => $code
            ],
            [
                'fields' => $fields,
            ]
        );

        return $this->processResponse($result);
    }
}
