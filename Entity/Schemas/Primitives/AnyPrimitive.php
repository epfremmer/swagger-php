<?php
/**
 * File AnyPrimitive.php
 *
 * @author Edward Pfremmer <epfremme@nerdery.com>
 */
namespace Epfremmer\SwaggerBundle\Entity\Schemas\Primitives;

use Doctrine\Common\Collections\ArrayCollection;
use Epfremmer\SwaggerBundle\Entity\Schemas\AbstractSchema;
use JMS\Serializer\Annotation as JMS;

/**
 * Trait AnyPrimitive
 *
 * @package Epfremmer\SwaggerBundle
 * @subpackage Entity\Schemas\Primitives
 */
trait AnyPrimitive
{

    /**
     * @JMS\Type("array")
     * @var array
     */
    protected $enum;

    /**
     * @JMS\Type("array")
     * @var array
     */
    protected $allOf;

    /**
     * @JMS\Type("array")
     * @var array
     */
    protected $anyOf;

    /**
     * @JMS\Type("array")
     * @var array
     */
    protected $oneOf;

    /**
     * @JMS\Type("string")
     * @var array
     */
    protected $not;

    /**
     * @JMS\Type("ArrayCollection<string,Epfremmer\SwaggerBundle\Entity\Schemas\AbstractSchema>")
     * @JMS\Accessor(setter="setDefinitions")
     *
     * @var AbstractSchema[]|ArrayCollection
     */
    protected $definitions;

    /**
     * @return array
     */
    public function getEnum()
    {
        return $this->enum;
    }

    /**
     * @param array $enum
     * @return AnyPrimitive
     */
    public function setEnum($enum)
    {
        $this->enum = $enum;
        return $this;
    }

    /**
     * @return array
     */
    public function getAllOf()
    {
        return $this->allOf;
    }

    /**
     * @param array $allOf
     * @return AnyPrimitive
     */
    public function setAllOf($allOf)
    {
        $this->allOf = $allOf;
        return $this;
    }

    /**
     * @return array
     */
    public function getAnyOf()
    {
        return $this->anyOf;
    }

    /**
     * @param array $anyOf
     * @return AnyPrimitive
     */
    public function setAnyOf($anyOf)
    {
        $this->anyOf = $anyOf;
        return $this;
    }

    /**
     * @return array
     */
    public function getOneOf()
    {
        return $this->oneOf;
    }

    /**
     * @param array $oneOf
     * @return AnyPrimitive
     */
    public function setOneOf($oneOf)
    {
        $this->oneOf = $oneOf;
        return $this;
    }

    /**
     * @return array
     */
    public function getNot()
    {
        return $this->not;
    }

    /**
     * @param array $not
     * @return AnyPrimitive
     */
    public function setNot($not)
    {
        $this->not = $not;
        return $this;
    }

    /**
     * @return AbstractSchema[]|ArrayCollection
     */
    public function getDefinitions()
    {
        return $this->definitions;
    }

    /**
     * @param AbstractSchema[]|ArrayCollection $definitions
     * @return AnyPrimitive
     */
    public function setDefinitions(ArrayCollection $definitions)
    {
        $this->definitions = $definitions;
        return $this;
    }
}