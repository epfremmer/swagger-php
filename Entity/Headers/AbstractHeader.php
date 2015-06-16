<?php
/**
 * File AbstractHeader.php
 *
 * @author Edward Pfremmer <epfremme@nerdery.com>
 */
namespace Epfremmer\SwaggerBundle\Entity\Headers;

use Epfremmer\SwaggerBundle\Entity\Schemas\AbstractSchema;
use JMS\Serializer\Annotation as JMS;

/**
 * Class AbstractHeader
 *
 * @JMS\Discriminator(field = "type", map = {
 *   "boolean": "Epfremmer\SwaggerBundle\Entity\Headers\BooleanHeader",
 *   "integer": "Epfremmer\SwaggerBundle\Entity\Headers\IntegerHeader",
 *   "number" : "Epfremmer\SwaggerBundle\Entity\Headers\NumberHeader",
 *   "string" : "Epfremmer\SwaggerBundle\Entity\Headers\StringHeader",
 *   "array"  : "Epfremmer\SwaggerBundle\Entity\Headers\ArrayHeader"
 * })
 *
 * @package Epfremmer\SwaggerBundle
 * @subpackage Entity\Headers
 */
abstract class AbstractHeader
{

    // header types
    const BOOLEAN_TYPE = AbstractSchema::BOOLEAN_TYPE;
    const INTEGER_TYPE = AbstractSchema::INTEGER_TYPE;
    const NUMBER_TYPE  = AbstractSchema::NUMBER_TYPE;
    const STRING_TYPE  = AbstractSchema::STRING_TYPE;
    const ARRAY_TYPE   = AbstractSchema::ARRAY_TYPE;

    /**
     * @JMS\Type("string")
     * @var string
     */
    protected $description;

    /**
     * @JMS\Type("string")
     * @var string
     */
    protected $format;

    /**
     * @JMS\Type("string")
     * @var array
     */
    protected $default;

    /**
     * Return schema type
     *
     * @return string
     */
    abstract public function getType();

    /**
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param string $description
     * @return AbstractHeader
     */
    public function setDescription($description)
    {
        $this->description = $description;
        return $this;
    }

    /**
     * @return string
     */
    public function getFormat()
    {
        return $this->format;
    }

    /**
     * @param string $format
     * @return AbstractHeader
     */
    public function setFormat($format)
    {
        $this->format = $format;
        return $this;
    }

    /**
     * @return array
     */
    public function getDefault()
    {
        return $this->default;
    }

    /**
     * @param array $default
     * @return AbstractHeader
     */
    public function setDefault($default)
    {
        $this->default = $default;
        return $this;
    }
}