<?php
/**
 * File NumericPrimitive.php
 *
 * @author Edward Pfremmer <epfremme@nerdery.com>
 */
namespace Epfremmer\SwaggerBundle\Entity\Schemas\Primitives;

use JMS\Serializer\Annotation as JMS;

/**
 * Trait NumericPrimitive
 *
 * @package Epfremmer\SwaggerBundle
 * @subpackage Entity\Schemas\Primitives
 */
trait NumericPrimitive
{
    use AnyPrimitive;

    /**
     * @JMS\Type("integer")
     * @var integer
     */
    protected $multipleOf;

    /**
     * @JMS\Type("integer")
     * @var integer
     */
    protected $maximum;

    /**
     * @JMS\Type("integer")
     * @var integer
     */
    protected $exclusiveMaximum;

    /**
     * @return int
     */
    public function getMultipleOf()
    {
        return $this->multipleOf;
    }

    /**
     * @param int $multipleOf
     * @return BooleanPrimitive
     */
    public function setMultipleOf($multipleOf)
    {
        $this->multipleOf = $multipleOf;
        return $this;
    }

    /**
     * @return int
     */
    public function getMaximum()
    {
        return $this->maximum;
    }

    /**
     * @param int $maximum
     * @return BooleanPrimitive
     */
    public function setMaximum($maximum)
    {
        $this->maximum = $maximum;
        return $this;
    }

    /**
     * @return int
     */
    public function getExclusiveMaximum()
    {
        return $this->exclusiveMaximum;
    }

    /**
     * @param int $exclusiveMaximum
     * @return BooleanPrimitive
     */
    public function setExclusiveMaximum($exclusiveMaximum)
    {
        $this->exclusiveMaximum = $exclusiveMaximum;
        return $this;
    }
}