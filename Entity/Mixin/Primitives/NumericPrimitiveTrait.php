<?php
/**
 * File NumericPrimitiveTrait.php
 *
 * @author Edward Pfremmer <epfremme@nerdery.com>
 */
namespace Epfremmer\SwaggerBundle\Entity\Mixin\Primitives;

use JMS\Serializer\Annotation as JMS;

/**
 * Trait NumericPrimitiveTrait
 *
 * @package Epfremmer\SwaggerBundle
 * @subpackage Entity\Schemas\Primitives
 */
trait NumericPrimitiveTrait
{
    use AnyPrimitiveTrait;

    /**
     * @JMS\Type("integer")
     * @JMS\SerializedName("multipleOf")
     * @var integer
     */
    protected $multipleOf;

    /**
     * @JMS\Type("integer")
     * @JMS\SerializedName("maximum")
     * @var integer
     */
    protected $maximum;

    /**
     * @JMS\Type("integer")
     * @JMS\SerializedName("exclusiveMaximum")
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
     * @return BooleanPrimitiveTrait
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
     * @return BooleanPrimitiveTrait
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
     * @return BooleanPrimitiveTrait
     */
    public function setExclusiveMaximum($exclusiveMaximum)
    {
        $this->exclusiveMaximum = $exclusiveMaximum;
        return $this;
    }
}