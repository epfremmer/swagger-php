<?php
/**
 * File ObjectPrimitiveTrait.php
 *
 * @author Edward Pfremmer <epfremme@nerdery.com>
 */
namespace Epfremmer\SwaggerBundle\Entity\Mixin\Primitives;

use Doctrine\Common\Collections\ArrayCollection;
use Epfremmer\SwaggerBundle\Entity\Schemas\AbstractSchema;
use JMS\Serializer\Annotation as JMS;

/**
 * Trait ObjectPrimitiveTrait
 *
 * @package Epfremmer\SwaggerBundle
 * @subpackage Entity\Schemas\Primitives
 */
trait ObjectPrimitiveTrait
{
    use AnyPrimitiveTrait;

    /**
     * @JMS\Type("integer")
     * @var integer
     */
    protected $maxProperties;

    /**
     * @JMS\Type("integer")
     * @var integer
     */
    protected $minProperties;

    /**
     * @JMS\Type("array")
     * @var string[]
     */
    protected $required;

    /**
     * @JMS\Type("ArrayCollection<string,Epfremmer\SwaggerBundle\Entity\Schemas\AbstractSchema>")
     * @var AbstractSchema[]|ArrayCollection
     */
    protected $properties;

    /**
     * @JMS\Type("boolean")
     * @var boolean
     */
    protected $additionalProperties;

    /**
     * @JMS\Type("string")
     * @var string
     */
    protected $patternProperties;

    /**
     * @JMS\Type("array")
     * @var array
     */
    protected $dependencies;

    /**
     * @return int
     */
    public function getMaxProperties()
    {
        return $this->maxProperties;
    }

    /**
     * @param int $maxProperties
     * @return ObjectPrimitiveTrait
     */
    public function setMaxProperties($maxProperties)
    {
        $this->maxProperties = $maxProperties;
        return $this;
    }

    /**
     * @return int
     */
    public function getMinProperties()
    {
        return $this->minProperties;
    }

    /**
     * @param int $minProperties
     * @return ObjectPrimitiveTrait
     */
    public function setMinProperties($minProperties)
    {
        $this->minProperties = $minProperties;
        return $this;
    }

    /**
     * @return \string[]
     */
    public function getRequired()
    {
        return $this->required;
    }

    /**
     * @param \string[] $required
     * @return ObjectPrimitiveTrait
     */
    public function setRequired($required)
    {
        $this->required = $required;
        return $this;
    }

    /**
     * @return AbstractSchema[]|ArrayCollection
     */
    public function getProperties()
    {
        return $this->properties;
    }

    /**
     * @param AbstractSchema[]|ArrayCollection $properties
     * @return ObjectPrimitiveTrait
     */
    public function setProperties($properties)
    {
        $this->properties = $properties;
        return $this;
    }

    /**
     * @return boolean
     */
    public function isAdditionalProperties()
    {
        return $this->additionalProperties;
    }

    /**
     * @param boolean $additionalProperties
     * @return ObjectPrimitiveTrait
     */
    public function setAdditionalProperties($additionalProperties)
    {
        $this->additionalProperties = $additionalProperties;
        return $this;
    }

    /**
     * @return string
     */
    public function getPatternProperties()
    {
        return $this->patternProperties;
    }

    /**
     * @param string $patternProperties
     * @return ObjectPrimitiveTrait
     */
    public function setPatternProperties($patternProperties)
    {
        $this->patternProperties = $patternProperties;
        return $this;
    }

    /**
     * @return array
     */
    public function getDependencies()
    {
        return $this->dependencies;
    }

    /**
     * @param array $dependencies
     * @return ObjectPrimitiveTrait
     */
    public function setDependencies($dependencies)
    {
        $this->dependencies = $dependencies;
        return $this;
    }
}