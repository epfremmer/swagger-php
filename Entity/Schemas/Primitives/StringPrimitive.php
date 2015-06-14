<?php
/**
 * File StringPrimitive.php
 *
 * @author Edward Pfremmer <epfremme@nerdery.com>
 */
namespace Epfremmer\SwaggerBundle\Entity\Schemas\Primitives;

use JMS\Serializer\Annotation as JMS;

/**
 * Trait StringPrimitive
 *
 * @package Epfremmer\SwaggerBundle
 * @subpackage Entity\Schemas\Primitives
 */
trait StringPrimitive
{
    use AnyPrimitive;

    /**
     * @JMS\Type("integer")
     * @var integer
     */
    protected $maxLength;

    /**
     * @JMS\Type("integer")
     * @var integer
     */
    protected $minLength;

    /**
     * @JMS\Type("string")
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
     * @return StringPrimitive
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
     * @return StringPrimitive
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
     * @return StringPrimitive
     */
    public function setPattern($pattern)
    {
        $this->pattern = $pattern;
        return $this;
    }
}