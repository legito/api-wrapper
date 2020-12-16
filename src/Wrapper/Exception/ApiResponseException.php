<?php

namespace Legito\Api\Wrapper\Exception;

/**
 * Class ApiResponseException\Exceptions
 * @package Legito\Api\Wrapper
 * @author Marek Skopal, Legito s.r.o.
 * @license MIT
 */
class ApiResponseException extends \RestClientException
{
    /** @var array */
    public $errors;
}
