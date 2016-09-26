<?php
/**
 * File ArrayPrimitiveTrait.php
 *
 * @author Edward Pfremmer <epfremme@nerdery.com>
 */
namespace Epfremme\Swagger\Entity\Mixin\Primitives;

use Epfremme\Swagger\Entity\Schemas\SchemaInterface;
use JMS\Serializer\Annotation as JMS;

/**
 * Trait ArrayPrimitiveTrait
 *
 * @package Epfremme\Swagger
 * @subpackage Entity\Schemas\Primitives
 */
trait ArrayPrimitiveTrait
{
    use AnyPrimitiveTrait;

    /**
     * @JMS\Since("2.0")
     * @JMS\Type("Epfremme\Swagger\Entity\Schemas\AbstractSchema")
     * @JMS\SerializedName("items")
     * @var SchemaInterface
     */
    protected $items;

    /**
     * @JMS\Since("2.0")
     * @JMS\Type("boolean")
     * @JMS\SerializedName("additionalItems")
     * @var boolean
     */
    protected $additionalItems;

    /**
     * @JMS\Since("2.0")
     * @JMS\Type("integer")
     * @JMS\SerializedName("maxItems")
     * @var integer
     */
    protected $maxItems;

    /**
     * @JMS\Since("2.0")
     * @JMS\Type("integer")
     * @JMS\SerializedName("minItems")
     * @var integer
     */
    protected $minItems;

    /**
     * @JMS\Since("2.0")
     * @JMS\Type("boolean")
     * @JMS\SerializedName("uniqueItems")
     * @var boolean
     */
    protected $uniqueItems;

    /**
     * @JMS\Since("2.0")
     * @JMS\Type("string")
     * @JMS\SerializedName("collectionFormat")
     * @var string
     */
    protected $collectionFormat;

    /**
     * @return SchemaInterface
     */
    public function getItems()
    {
        return $this->items;
    }

    /**
     * @param SchemaInterface $items
     * @return ArrayPrimitiveTrait
     */
    public function setItems(SchemaInterface $items)
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

    /**
     * @return string
     */
    public function getCollectionFormat()
    {
        return $this->collectionFormat;
    }

    /**
     * @param string $collectionFormat
     * @return ArrayPrimitiveTrait
     */
    public function setCollectionFormat($collectionFormat)
    {
        $this->collectionFormat = $collectionFormat;
        return $this;
    }
}
