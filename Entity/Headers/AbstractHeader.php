<?php
/**
 * File AbstractHeader.php
 *
 * @author Edward Pfremmer <epfremme@nerdery.com>
 */
namespace ERP\Swagger\Entity\Headers;

use ERP\Swagger\Entity\Schemas\AbstractSchema;
use ERP\Swagger\Annotations as EP;
use JMS\Serializer\Annotation as JMS;

/**
 * Class AbstractHeader
 *
 * @EP\Discriminator(field = "type", default="array", map = {
 *   "boolean": "ERP\Swagger\Entity\Headers\BooleanHeader",
 *   "integer": "ERP\Swagger\Entity\Headers\IntegerHeader",
 *   "number" : "ERP\Swagger\Entity\Headers\NumberHeader",
 *   "string" : "ERP\Swagger\Entity\Headers\StringHeader",
 *   "array"  : "ERP\Swagger\Entity\Headers\ArrayHeader"
 * })
 *
 * @package ERP\Swagger
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
     * @JMS\SerializedName("type")
     * @var string
     */
    protected $type;

    /**
     * @JMS\Type("string")
     * @JMS\SerializedName("description")
     * @var string
     */
    protected $description;

    /**
     * @JMS\Type("string")
     * @JMS\SerializedName("format")
     * @var string
     */
    protected $format;

    /**
     * @JMS\Type("string")
     * @JMS\SerializedName("default")
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