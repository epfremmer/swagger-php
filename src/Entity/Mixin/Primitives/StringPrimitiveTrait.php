<?php
/**
 * File StringPrimitiveTrait.php
 *
 * @author Edward Pfremmer <epfremme@nerdery.com>
 */
namespace Epfremme\Swagger\Entity\Mixin\Primitives;

use JMS\Serializer\Annotation as JMS;

/**
 * Trait StringPrimitiveTrait
 *
 * @package Epfremme\Swagger
 * @subpackage Entity\Schemas\Primitives
 */
trait StringPrimitiveTrait
{
    use AnyPrimitiveTrait;

    /**
     * @JMS\Since("2.0")
     * @JMS\Type("integer")
     * @JMS\SerializedName("maxLength")
     * @var integer
     */
    protected $maxLength;

    /**
     * @JMS\Since("2.0")
     * @JMS\Type("integer")
     * @JMS\SerializedName("minLength")
     * @var integer
     */
    protected $minLength;

    /**
     * @JMS\Since("2.0")
     * @JMS\Type("string")
     * @JMS\SerializedName("pattern")
     * @var string
     */
    protected $pattern;

    /**
     * @return int
     */
    public function getMaxLength()
    {
        return $this->maxLength;
    }

    /**
     * @param int $maxLength
     * @return StringPrimitiveTrait
     */
    public function setMaxLength($maxLength)
    {
        $this->maxLength = $maxLength;
        return $this;
    }

    /**
     * @return int
     */
    public function getMinLength()
    {
        return $this->minLength;
    }

    /**
     * @param int $minLength
     * @return StringPrimitiveTrait
     */
    public function setMinLength($minLength)
    {
        $this->minLength = $minLength;
        return $this;
    }

    /**
     * @return string
     */
    public function getPattern()
    {
        return $this->pattern;
    }

    /**
     * @param string $pattern
     * @return StringPrimitiveTrait
     */
    public function setPattern($pattern)
    {
        $this->pattern = $pattern;
        return $this;
    }
}
