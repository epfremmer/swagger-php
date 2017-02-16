<?php
/**
 * File SwaggerParser.php
 *
 * @author Edward Pfremmer <epfremme@nerdery.com>
 */
namespace Epfremme\Swagger\Parser;

use Epfremme\Swagger\Exception\InvalidVersionException;
use Symfony\Component\Yaml\Yaml;

/**
 * Class SwaggerParser
 *
 * @package Epfremme\Swagger
 * @subpackage Parser
 */
abstract class SwaggerParser
{
    // default swagger version
    const MINIMUM_VERSION = '2.0';
    const VERSION_KEY = 'swagger';

    /**
     * Swagger Data
     * @var array
     */
    protected $data;

    /**
     * Return swagger version
     *
     * @return string
     */
    public function getVersion()
    {
        if (!array_key_exists(self::VERSION_KEY, $this->data)) {
            $this->data[self::VERSION_KEY] = self::MINIMUM_VERSION;
        }

        if (!version_compare($this->data[self::VERSION_KEY], SwaggerParser::MINIMUM_VERSION, '>=')) {
            throw new InvalidVersionException($this->data[self::VERSION_KEY]);
        }

        return $this->data[self::VERSION_KEY];
    }

    /**
     * Return swagger data
     *
     * @return array
     */
    public function getData()
    {
        return $this->data;
    }

    /**
     * Return data as json
     *
     * {@inheritdoc
     */
    function __toString()
    {
        return json_encode($this->data);
    }
}
