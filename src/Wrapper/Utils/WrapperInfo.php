<?php

namespace Legito\Api\Wrapper\Utils;

/**
 * Class WrapperInfo
 * @package Legito\Api\Wrapper\Utils
 */
class WrapperInfo
{
    /**
     * Returns composer version of this wrapper
     * @return string
     */
    public static function getVersion(): string
    {
        $composerContents = file_get_contents(__DIR__ . '/../../../composer.json');
        $composer = json_decode($composerContents);
        return $composer->version;
    }
}