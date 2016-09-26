<?php
/**
 * File InvalidVersionException.php
 *
 * @author Edward Pfremmer <epfremme@nerdery.com>
 */
namespace Epfremme\Swagger\Exception;

/**
 * Class InvalidVersionException
 *
 * @package Epfremme\Swagger
 * @subpackage Exception
 */
class InvalidVersionException extends \OutOfBoundsException
{
    // custom exception message
    const EXCEPTION_MESSAGE = "Swagger version '%s' is not supported. Please upgrade to version 2.0 or higher";

    /**
     *
     * @param null $version
     */
    public function __construct($version = null)
    {
        parent::__construct(sprintf(self::EXCEPTION_MESSAGE, $version));
    }
}
