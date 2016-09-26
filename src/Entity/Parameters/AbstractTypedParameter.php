<?php
/**
 * File AbstractParameter.php
 *
 * @author Edward Pfremmer <epfremme@nerdery.com>
 */
namespace Epfremme\Swagger\Entity\Parameters;

use Epfremme\Swagger\Entity\Schemas\AbstractSchema;
use JMS\Serializer\Annotation as JMS;

/**
 * Class AbstractParameter
 *
 * @package Epfremme\Swagger
 * @subpackage Entity\Parameters
 */
abstract class AbstractTypedParameter extends AbstractParameter
{
    // parameter types
    const FILE_TYPE    = 'file';
    const BOOLEAN_TYPE = AbstractSchema::BOOLEAN_TYPE;
    const INTEGER_TYPE = AbstractSchema::INTEGER_TYPE;
    const NUMBER_TYPE  = AbstractSchema::NUMBER_TYPE;
    const STRING_TYPE  = AbstractSchema::STRING_TYPE;
    const ARRAY_TYPE   = AbstractSchema::ARRAY_TYPE;

    /**
     * @JMS\Since("2.0")
     * @JMS\Type("string")
     * @JMS\SerializedName("type")
     * @var string
     */
    protected $type;

    /**
     * @JMS\Since("2.0")
     * @JMS\Type("string")
     * @JMS\SerializedName("format")
     * @var string
     */
    protected $format;

    /**
     * @JMS\Since("2.0")
     * @JMS\Type("boolean")
     * @JMS\SerializedName("allowEmptyValues")
     * @var boolean
     */
    protected $allowEmptyValues;

    /**
     * @JMS\Since("2.0")
     * @JMS\Type("string")
     * @JMS\SerializedName("default")
     * @var string
     */
    protected $default;

    /**
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param string $type
     * @return AbstractTypedParameter
     */
    public function setType($type)
    {
        $this->type = $type;
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
     * @return AbstractTypedParameter
     */
    public function setFormat($format)
    {
        $this->format = $format;
        return $this;
    }

    /**
     * @return boolean
     */
    public function isAllowEmptyValues()
    {
        return $this->allowEmptyValues;
    }

    /**
     * @param boolean $allowEmptyValues
     * @return AbstractTypedParameter
     */
    public function setAllowEmptyValues($allowEmptyValues)
    {
        $this->allowEmptyValues = $allowEmptyValues;
        return $this;
    }

    /**
     * @return string
     */
    public function getDefault()
    {
        return $this->default;
    }

    /**
     * @param string $default
     * @return AbstractTypedParameter
     */
    public function setDefault($default)
    {
        $this->default = $default;
        return $this;
    }
}
