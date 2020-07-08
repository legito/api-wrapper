<?php

namespace Legito\Api\Wrapper\V2\Resource;


/**
 * Class NotificationSetting
 * @package Legito\Api\Wrapper\V2\Resource
 * @author Marek Skopal, Legito s.r.o.
 * @license MIT
 */
class NotificationSetting extends AbstractResource
{
    protected const RESOURCE = '/notification-setting';

    /**
     * Returns user notification settings
     * @param string $userIdOrEmail
     * @return \stdClass
     * @throws \Legito\Api\Wrapper\Exception\NotFoundException
     */
    public function getNotificationSetting(string $userIdOrEmail): \stdClass
    {
        $result = $this->client->get(
            self::RESOURCE,
            [
                'userIdOrEmail' => $userIdOrEmail
            ]
        );

        return $this->processResponse($result);
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
        $result = $this->client->put(
            self::RESOURCE,
            [
                'userIdOrEmail' => $userIdOrEmail
            ],
            $notificationSettingData
        );

        return $this->processResponse($result);
    }
}
