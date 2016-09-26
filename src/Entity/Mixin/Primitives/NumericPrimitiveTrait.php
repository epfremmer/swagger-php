<?php
/**
 * File NumericPrimitiveTrait.php
 *
 * @author Edward Pfremmer <epfremme@nerdery.com>
 */
namespace Epfremme\Swagger\Entity\Mixin\Primitives;

use JMS\Serializer\Annotation as JMS;

/**
 * Trait NumericPrimitiveTrait
 *
 * @package Epfremme\Swagger
 * @subpackage Entity\Schemas\Primitives
 */
trait NumericPrimitiveTrait
{
    use AnyPrimitiveTrait;

    /**
     * @JMS\Since("2.0")
     * @JMS\Type("float")
     * @JMS\SerializedName("multipleOf")
     * @var integer
     */
    protected $multipleOf;

    /**
     * @JMS\Since("2.0")
     * @JMS\Type("float")
     * @JMS\SerializedName("maximum")
     * @var integer
     */
    protected $maximum;

    /**
     * @JMS\Since("2.0")
     * @JMS\Type("float")
     * @JMS\SerializedName("exclusiveMaximum")
     * @var integer
     */
    protected $exclusiveMaximum;

    /**
     * @JMS\Since("2.0")
     * @JMS\Type("float")
     * @JMS\SerializedName("minimum")
     * @var integer
     */
    protected $minimum;

    /**
     * @JMS\Since("2.0")
     * @JMS\Type("float")
     * @JMS\SerializedName("exclusiveMinimum")
     * @var integer
     */
    protected $exclusiveMinimum;

    /**
     * @return float
     */
    public function getMultipleOf()
    {
        return $this->multipleOf;
    }

    /**
     * @param float $multipleOf
     * @return BooleanPrimitiveTrait
     */
    public function setMultipleOf($multipleOf)
    {
        $this->multipleOf = $multipleOf;
        return $this;
    }

    /**
     * @return float
     */
    public function getMaximum()
    {
        return $this->maximum;
    }

    /**
     * @param float $maximum
     * @return BooleanPrimitiveTrait
     */
    public function setMaximum($maximum)
    {
        $this->maximum = $maximum;
        return $this;
    }

    /**
     * @return float
     */
    public function getExclusiveMaximum()
    {
        return $this->exclusiveMaximum;
    }

    /**
     * @param float $exclusiveMaximum
     * @return BooleanPrimitiveTrait
     */
    public function setExclusiveMaximum($exclusiveMaximum)
    {
        $this->exclusiveMaximum = $exclusiveMaximum;
        return $this;
    }

    /**
     * @return float
     */
    public function getMinimum()
    {
        return $this->minimum;
    }

    /**
     * @param float $minimum
     * @return NumericPrimitiveTrait
     */
    public function setMinimum($minimum)
    {
        $this->minimum = $minimum;
        return $this;
    }

    /**
     * @return float
     */
    public function getExclusiveMinimum()
    {
        return $this->exclusiveMinimum;
    }

    /**
     * @param float $exclusiveMinimum
     * @return NumericPrimitiveTrait
     */
    public function setExclusiveMinimum($exclusiveMinimum)
    {
        $this->exclusiveMinimum = $exclusiveMinimum;
        return $this;
    }
}
