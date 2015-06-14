<?php
/**
 * File ArrayPrimitive.php
 *
 * @author Edward Pfremmer <epfremme@nerdery.com>
 */
namespace Epfremmer\SwaggerBundle\Entity\Schemas\Primitives;

use JMS\Serializer\Annotation as JMS;

/**
 * Trait ArrayPrimitive
 *
 * @package Epfremmer\SwaggerBundle
 * @subpackage Entity\Schemas\Primitives
 */
trait ArrayPrimitive
{
    use AnyPrimitive;

    /**
     * @JMS\Type("array")
     * @var array
     */
    protected $items;

    /**
     * @JMS\Type("boolean")
     * @var boolean
     */
    protected $additionalItems;

    /**
     * @JMS\Type("integer")
     * @var integer
     */
    protected $maxItems;

    /**
     * @JMS\Type("integer")
     * @var integer
     */
    protected $minItems;

    /**
     * @JMS\Type("boolean")
     * @var boolean
     */
    protected $uniqueItems;

    /**
     * @return array
     */
    public function getItems()
    {
        return $this->items;
    }

    /**
     * @param array $items
     * @return ArrayPrimitive
     */
    public function setItems($items)
    {
        $this->items = $items;
        return $this;
    }

    /**
     * @return boolean
     */
    public function isAdditionalItems()
    {
        return $this->additionalItems;
    }

    /**
     * @param boolean $additionalItems
     * @return ArrayPrimitive
     */
    public function setAdditionalItems($additionalItems)
    {
        $this->additionalItems = $additionalItems;
        return $this;
    }

    /**
     * @return int
     */
    public function getMaxItems()
    {
        return $this->maxItems;
    }

    /**
     * @param int $maxItems
     * @return ArrayPrimitive
     */
    public function setMaxItems($maxItems)
    {
        $this->maxItems = $maxItems;
        return $this;
    }

    /**
     * @return int
     */
    public function getMinItems()
    {
        return $this->minItems;
    }

    /**
     * @param int $minItems
     * @return ArrayPrimitive
     */
    public function setMinItems($minItems)
    {
        $this->minItems = $minItems;
        return $this;
    }

    /**
     * @return boolean
     */
    public function isUniqueItems()
    {
        return $this->uniqueItems;
    }

    /**
     * @param boolean $uniqueItems
     * @return ArrayPrimitive
     */
    public function setUniqueItems($uniqueItems)
    {
        $this->uniqueItems = $uniqueItems;
        return $this;
    }
}