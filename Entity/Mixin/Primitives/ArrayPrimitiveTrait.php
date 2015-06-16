<?php
/**
 * File ArrayPrimitiveTrait.php
 *
 * @author Edward Pfremmer <epfremme@nerdery.com>
 */
namespace Epfremmer\SwaggerBundle\Entity\Mixin\Primitives;

use JMS\Serializer\Annotation as JMS;

/**
 * Trait ArrayPrimitiveTrait
 *
 * @package Epfremmer\SwaggerBundle
 * @subpackage Entity\Schemas\Primitives
 */
trait ArrayPrimitiveTrait
{
    use AnyPrimitiveTrait;

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
     * @return ArrayPrimitiveTrait
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
     * @return ArrayPrimitiveTrait
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
     * @return ArrayPrimitiveTrait
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
     * @return ArrayPrimitiveTrait
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
     * @return ArrayPrimitiveTrait
     */
    public function setUniqueItems($uniqueItems)
    {
        $this->uniqueItems = $uniqueItems;
        return $this;
    }
}