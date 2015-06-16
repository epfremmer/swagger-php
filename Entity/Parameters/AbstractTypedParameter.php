<?php
/**
 * File AbstractParameter.php
 *
 * @author Edward Pfremmer <epfremme@nerdery.com>
 */
namespace Epfremmer\SwaggerBundle\Entity\Parameters;

use Epfremmer\SwaggerBundle\Entity\Schemas\AbstractSchema;
use JMS\Serializer\Annotation as JMS;

/**
 * Class AbstractParameter
 *
 * @package Epfremmer\SwaggerBundle
 * @subpackage Entity\Parameters
 */
abstract class AbstractTypedParameter extends AbstractParameter
{

    /**
     * @JMS\Type("string")
     * @var string
     */
    protected $type;

    /**
     * @JMS\Type("string")
     * @var string
     */
    protected $format;

    /**
     * @JMS\Type("boolean")
     * @var boolean
     */
    protected $allowEmptyValues;

    /**
     * @JMS\Type("string")
     * @var string
     */
    protected $default;

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