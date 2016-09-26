<?php
/**
 * File ObjectPrimitiveTrait.php
 *
 * @author Edward Pfremmer <epfremme@nerdery.com>
 */
namespace Epfremme\Swagger\Entity\Mixin\Primitives;

use Doctrine\Common\Collections\ArrayCollection;
use Epfremme\Swagger\Entity\Schemas\SchemaInterface;
use JMS\Serializer\Annotation as JMS;

/**
 * Trait ObjectPrimitiveTrait
 *
 * @package Epfremme\Swagger
 * @subpackage Entity\Schemas\Primitives
 */
trait ObjectPrimitiveTrait
{
    use AnyPrimitiveTrait;

    /**
     * @JMS\Since("2.0")
     * @JMS\Type("integer")
     * @JMS\SerializedName("maxProperties")
     * @var integer
     */
    protected $maxProperties;

    /**
     * @JMS\Since("2.0")
     * @JMS\Type("integer")
     * @JMS\SerializedName("minProperties")
     * @var integer
     */
    protected $minProperties;

    /**
     * @JMS\Since("2.0")
     * @JMS\Type("array")
     * @JMS\SerializedName("required")
     * @var string[]
     */
    protected $required;

    /**
     * @JMS\Since("2.0")
     * @JMS\Type("ArrayCollection<string,Epfremme\Swagger\Entity\Schemas\AbstractSchema>")
     * @JMS\SerializedName("properties")
     * @var SchemaInterface[]|ArrayCollection
     */
    protected $properties;

    /**
     * @JMS\Since("2.0")
     * @JMS\Type("boolean")
     * @JMS\SerializedName("additionalProperties")
     * @var boolean
     */
    protected $additionalProperties;

    /**
     * @JMS\Since("2.0")
     * @JMS\Type("string")
     * @JMS\SerializedName("patternProperties")
     * @var string
     */
    protected $patternProperties;

    /**
     * @JMS\Since("2.0")
     * @JMS\Type("array")
     * @JMS\SerializedName("dependencies")
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
     * @return SchemaInterface[]|ArrayCollection
     */
    public function getProperties()
    {
        return $this->properties;
    }

    /**
     * @param SchemaInterface[]|ArrayCollection $properties
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
