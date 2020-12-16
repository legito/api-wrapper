<?php

namespace Legito\Api\Wrapper\V3;

use Legito\Api\Wrapper\V3\Resource\AdvancedStyle;
use Legito\Api\Wrapper\V3\Resource\Country;
use Legito\Api\Wrapper\V3\Resource\Currency;
use Legito\Api\Wrapper\V3\Resource\DocumentRecord;
use Legito\Api\Wrapper\V3\Resource\Category;
use Legito\Api\Wrapper\V3\Resource\DocumentRecordType;
use Legito\Api\Wrapper\V3\Resource\File;
use Legito\Api\Wrapper\V3\Resource\Info;
use Legito\Api\Wrapper\V3\Resource\Label;
use Legito\Api\Wrapper\V3\Resource\NotificationSetting;
use Legito\Api\Wrapper\V3\Resource\Property;
use Legito\Api\Wrapper\V3\Resource\PropertyGroup;
use Legito\Api\Wrapper\V3\Resource\PushConnection;
use Legito\Api\Wrapper\V3\Resource\Share;
use Legito\Api\Wrapper\V3\Resource\DocumentVersion;
use Legito\Api\Wrapper\V3\Resource\TemplateSuite;
use Legito\Api\Wrapper\V3\Resource\TemplateTag;
use Legito\Api\Wrapper\V3\Resource\Timezone;
use Legito\Api\Wrapper\V3\Resource\User;
use Legito\Api\Wrapper\V3\Resource\UserGroup;

/**
 * Class Wrapper
 * @package Legito\Api\Wrapper\V3
 * @author Marek Skopal, Legito s.r.o.
 * @license MIT
 */
class Wrapper
{

    /** @var AdvancedStyle */
    protected $advancesStyleResource;

    /** @var Country */
    protected $countryResource;

    /** @var Currency */
    protected $currencyResource;

    /** @var DocumentRecord */
    protected $documentRecordResource;

    /** @var DocumentRecordType */
    protected $documentRecordTypeResource;

    /** @var DocumentRecord */
    protected $categoryResource;

    /** @var Info */
    protected $infoResource;

    /** @var Label */
    protected $labelResource;

    /** @var File */
    protected $fileResource;

    /** @var NotificationSetting */
    protected $notificationSettingResource;

    /** @var Property */
    protected $propertyResource;

    /** @var PropertyGroup */
    protected $propertyGroupResource;

    /** @var PropertyGroup */
    protected $pushConnectionResource;

    /** @var Share */
    protected $shareResource;

    /** @var TemplateSuite */
    protected $documentVersionResource;

    /** @var TemplateSuite */
    protected $templateSuiteResource;

    /** @var TemplateTag */
    protected $templateTagResource;

    /** @var Timezone */
    protected $timezoneResource;

    /** @var User */
    protected $userResource;

    /** @var UserGroup */
    protected $userGroupResource;

    public function __construct(string $apiKey, string $privateKey, ?string $url = NULL)
    {
        $client = new Client($apiKey, $privateKey, $url);

        $this->advancesStyleResource = new AdvancedStyle($client);
        $this->categoryResource = new Category($client);
        $this->countryResource = new Country($client);
        $this->currencyResource = new Currency($client);
        $this->documentRecordResource = new DocumentRecord($client);
        $this->documentRecordTypeResource = new DocumentRecordType($client);
        $this->documentVersionResource = new DocumentVersion($client);
        $this->fileResource = new File($client);
        $this->infoResource = new Info($client);
        $this->labelResource = new Label($client);
        $this->notificationSettingResource = new NotificationSetting($client);
        $this->propertyResource = new Property($client);
        $this->propertyGroupResource = new PropertyGroup($client);
        $this->pushConnectionResource = new PushConnection($client);
        $this->shareResource = new Share($client);
        $this->timezoneResource = new Timezone($client);
        $this->templateSuiteResource = new TemplateSuite($client);
        $this->templateTagResource = new TemplateTag($client);
        $this->userResource = new User($client);
        $this->userGroupResource = new UserGroup($client);
    }

    /**
     * Returns advanced style list
     * @return array
     * @throws \RestClientException
     */
    public function getAdvancedStyle(): array
    {
        return $this->advancesStyleResource->getAdvancedStyle();
    }

    /**
     * Returns category list
     * @return array
     * @throws \RestClientException
     */
    public function getCategory(): array
    {
        return $this->categoryResource->getCategory();
    }

    /**
     * Returns country list
     * @return array
     * @throws \RestClientException
     */
    public function getCountry(): array
    {
        return $this->countryResource->getCountry();
    }

    /**
     * Returns currency list
     * @return array
     * @throws \RestClientException
     */
    public function getCurrency(): array
    {
        return $this->currencyResource->getCurrency();
    }

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
        return $this->documentRecordResource->getDocumentRecord($id, $code, $limit, $offset, $templateSuiteId, $deleted);
    }

    /**
     * Creates new document record
     * @param mixed $data
     * @return \stdClass
     * @throws \RestClientException
     */
    public function postDocumentRecord($data = NULL): \stdClass
    {
        return $this->documentRecordResource->postDocumentRecord($data);
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
        return $this->documentRecordResource->putDocumentRecord($code, $data);
    }

    /**
     * Deletes document record
     * @param string $code
     * @return \stdClass
     * @throws \RestClientException
     */
    public function deleteDocumentRecord(string $code): \stdClass
    {
        return $this->documentRecordResource->deleteDocumentRecord($code);
    }

    /**
     * Anonymize document record
     * @param string $code
     * @param array|string[] $fields
     * @return \stdClass
     */
    public function getAnonymizeDocumentRecord(
        string $code,
        array $fields = [DocumentRecord::ANONYMIZE_FIELD_MONEY, DocumentRecord::ANONYMIZE_FIELD_CLAUSES, DocumentRecord::ANONYMIZE_FIELD_DATE, DocumentRecord::ANONYMIZE_FIELD_TEXTFIELD, DocumentRecord::ANONYMIZE_FIELD_PARAGRAPHS]
    ): \stdClass {
        return $this->documentRecordResource->getAnonymizeDocumentRecord($code, $fields);
    }

    /**
     * Returns document record type list
     * @return array
     * @throws \RestClientException
     */
    public function getDocumentRecordType(): array
    {
        return $this->documentRecordTypeResource->getDocumentRecordType();
    }

    /**
     * Inserts document record type
     * @param mixed $data
     * @return \stdClass
     * @throws \RestClientException
     */
    public function postDocumentRecordType($data = NULL): \stdClass
    {
        return $this->documentRecordTypeResource->postDocumentRecordType($data);
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
        return $this->documentRecordTypeResource->putDocumentRecordType($documentRecordTypeId, $data);
    }

    /**
     * Deletes document record type
     * @param int $documentRecordTypeId
     * @return \stdClass
     * @throws \RestClientException
     */
    public function deleteDocumentRecordType(int $documentRecordTypeId): \stdClass
    {
        return $this->documentRecordTypeResource->deleteDocumentRecordType($documentRecordTypeId);
    }


    /**
     * Returns document version elements data
     * @param string $code
     * @param string|null $listType
     * @return array
     * @throws \RestClientException
     */
    public function getDocumentVersionData(string $code, ?string $listType): array
    {
        return $this->documentVersionResource->getDocumentVersionData($code, $listType);
    }

    /**
     * Inserts elements data into template and creates new document version
     * @param int $agreementId
     * @param mixed $data
     * @return \stdClass
     * @throws \RestClientException
     */
    public function postDocumentVersionData(int $templateSuiteId, $data = NULL): \stdClass
    {
        return $this->documentVersionResource->postDocumentVersionData($templateSuiteId, $data);
    }

    /**
     * Puts elements data into template and creates new document version
     * @param string $code
     * @param mixed $data
     * @return \stdClass
     * @throws \RestClientException
     */
    public function putDocumentVersionData(string $code, $data = NULL): \stdClass
    {
        return $this->documentVersionResource->putDocumentVersionData($code, $data);
    }

    /**
     * Downloads document version in base64 encoded file
     * @param string $code
     * @param string $format
     * @param string $documentId
     * @param int $templateId
     * @return array
     * @throws \RestClientException
     */
    public function getDocumentVersionDownload(string $code, string $format, ?int $templateId = NULL, ?int $advancedStyleId = NULL): array
    {
        return $this->documentVersionResource->getDocumentVersionDownload($code, $format, $templateId, $advancedStyleId);
    }

    /**
     * Returns files related to Document Record
     * @param string $documentRecordCode
     * @return array
     * @throws \RestClientException
     */
    public function getFile(string $documentRecordCode): array
    {
        return $this->fileResource->getFile($documentRecordCode);
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
        return $this->fileResource->postFile($documentRecordCode, $fileData);
    }

    /**
     * Removes external file from Document Record
     * @param int $fileId
     * @return \stdClass
     * @throws \Legito\Api\Wrapper\Exception\NotFoundException
     */
    public function deleteFile(int $fileId): \stdClass
    {
        return $this->fileResource->deleteFile($fileId);
    }

    /**
     * Downloads external file
     * @param int $fileId
     * @return \stdClass
     * @throws \Legito\Api\Wrapper\Exception\NotFoundException
     */
    public function getFileDownload(int $fileId): \stdClass
    {
        return $this->fileResource->getFileDownload($fileId);
    }

    /**
     * Returns info
     * @return \stdClass
     * @throws \RestClientException
     */
    public function getInfo(): \stdClass
    {
        return $this->infoResource->getInfo();
    }

    /**
     * Returns label list
     * @return array
     * @throws \RestClientException
     */
    public function getLabel(): array
    {
        return $this->labelResource->getLabel();
    }

    /**
     * Post label
     * @param string $code
     * @param mixed $data
     * @return \stdClass
     * @throws \RestClientException
     */
    public function postLabel($data = NULL): \stdClass
    {
        return $this->labelResource->postLabel($data);
    }

    /**
     * Deletes label
     * @param int $labelId
     * @return \stdClass
     * @throws \RestClientException
     */
    public function deleteLabel(int $labelId): \stdClass
    {
        return $this->labelResource->deleteLabel($labelId);
    }

    /**
     * Returns user notification settings
     * @param string $userIdOrEmail
     * @return \stdClass
     * @throws \Legito\Api\Wrapper\Exception\NotFoundException
     */
    public function getNotificationSetting(string $userIdOrEmail): \stdClass
    {
        return $this->notificationSettingResource->getNotificationSetting($userIdOrEmail);
    }

    /**
     * Updates user notification settings
     * @param string $userIdOrEmail
     * @param array $notificationSettingData
     * @return \stdClass
     * @throws \Legito\Api\Wrapper\Exception\NotFoundException
     */
    public function putNotificationSetting(string $userIdOrEmail, array $notificationSettingData): \stdClass
    {
        return $this->notificationSettingResource->putNotificationSetting($userIdOrEmail, $notificationSettingData);
    }


    /**
     * Returns property list
     * @return array
     * @throws \RestClientException
     */
    public function getProperty(): array
    {
        return $this->propertyResource->getProperty();
    }


    /**
     * Returns property group list
     * @return array
     * @throws \RestClientException
     */
    public function getPropertyGroup(): array
    {
        return $this->propertyGroupResource->getPropertyGroup();
    }


    /**
     * Returns push connection list
     * @return array
     * @throws \RestClientException
     */
    public function getPushConnection(): array
    {
        return $this->pushConnectionResource->getPushConnection();
    }

    /**
     * Creates new push connection
     * @param mixed $data
     * @return \stdClass
     * @throws \RestClientException
     */
    public function postPushConnection($data = NULL): \stdClass
    {
        return $this->pushConnectionResource->postPushConnection($data);
    }


    /**
     * Returns share list for document record
     * @param string $code
     * @return array
     * @throws \RestClientException
     */
    public function getShare(string $code): array
    {
        return $this->shareResource->getShare($code);
    }

    /**
     * Posts user share
     * @param string $code
     * @param array|NULL $data
     * @return \stdClass
     * @throws \RestClientException
     */
    public function postShareUser(string $code, $data = NULL): \stdClass
    {
        return $this->shareResource->postShareUser($code, $data);
    }

    /**
     * Deletes user share
     * @param string $code
     * @param string $idEmail
     * @return \stdClass
     * @throws \RestClientException
     */
    public function deleteShareUser(string $code, string $idEmail): \stdClass
    {
        return $this->shareResource->deleteShareUser($code, $idEmail);
    }
    
    /**
     * Posts user group share
     * @param string $code
     * @param array|NULL $data
     * @return array
     * @throws \RestClientException
     */
    public function postShareUserGroup(string $code, $data = NULL): array
    {
        return $this->shareResource->postShareUserGroup($code, $data);
    }

    /**
     * Deletes user group share
     * @param string $code
     * @param string $idEmail
     * @return \stdClass
     * @throws \RestClientException
     */
    public function deleteShareUserGroup(string $code, string $idEmail): \stdClass
    {
        return $this->shareResource->deleteShareUserGroup($code, $idEmail);
    }

    /**
     * Returns template suite list
     * @return array
     * @throws \RestClientException
     */
    public function getTemplateSuite(): array
    {
        return $this->templateSuiteResource->getTemplateSuite();
    }


    /**
     * Returns template tag list
     * @return array
     * @throws \RestClientException
     */
    public function getTemplateTag(): array
    {
        return $this->templateTagResource->getTemplateTag();
    }

    /**
     * Post template tag
     * @param mixed $data
     * @return \stdClass
     * @throws \RestClientException
     */
    public function postTemplateTag($data = NULL): \stdClass
    {
        return $this->templateTagResource->postTemplateTag($data);
    }


    /**
     * Returns timezone list
     * @return array
     * @throws \RestClientException
     */
    public function getTimezone(): array
    {
        return $this->timezoneResource->getTimezone();
    }


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
        return $this->userResource->getUser($id, $email, $limit, $offset);
    }

    /**
     * Posts user
     * @param array|NULL $data
     * @return \stdClass
     * @throws \RestClientException
     */
    public function postUser($data = NULL): \stdClass
    {
        return $this->userResource->postUser($data);
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
        return $this->userResource->putUser($idEmail, $data);
    }

    /**
     * Deletes user
     * @param string $idEmail
     * @return \stdClass
     * @throws \RestClientException
     */
    public function deleteUser(string $idEmail): \stdClass
    {
        return $this->userResource->deleteUser($idEmail);
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
        return $this->userResource->putUserPermission($idEmail, $data);
    }

    /**
     * Returns user group list
     * @return array
     * @throws \RestClientException
     */
    public function getUserGroup(): array
    {
        return $this->userGroupResource->getUserGroup();
    }

    /**
     * Posts user group
     * @param array|NULL $data
     * @return \stdClass
     * @throws \RestClientException
     */
    public function postUserGroup($data = NULL): \stdClass
    {
        return $this->userGroupResource->postUserGroup($data);
    }

    /**
     * Updates user group
     * @param int $userGroupId
     * @param array|NULL $data
     * @return \stdClass
     * @throws \RestClientException
     */
    public function putUserGroup(int $userGroupId, $data = NULL): \stdClass
    {
        return $this->userGroupResource->putUserGroup($userGroupId, $data);
    }

    /**
     * Deletes user group
     * @param int $userGroupId
     * @return \stdClass
     * @throws \RestClientException
     */
    public function deleteUserGroup(int $userGroupId): \stdClass
    {
        return $this->userGroupResource->deleteUserGroup($userGroupId);
    }

    /**
     * Inserts user to user group
     * @param int $userGroupId
     * @param array|NULL $data
     * @return mixed
     * @throws \RestClientException
     */
    public function postUserGroupUser(string $userGroupId, $data = NULL)
    {
        return $this->userGroupResource->postUserGroupUser($userGroupId, $data);
    }

    /**
     * Inserts user to user group
     * @param int $userGroupId
     * @param string $idEmail
     * @return mixed
     * @throws \RestClientException
     */
    public function deleteUserGroupUser(string $userGroupId, string $idEmail)
    {
        return $this->userGroupResource->deleteUserGroupUser($userGroupId, $idEmail);
    }
}
