<?php
/**
 * File QueryParameter.php
 *
 * @author Edward Pfremmer <epfremme@nerdery.com>
 */
namespace Epfremmer\SwaggerBundle\Entity\Parameters;

use JMS\Serializer\Annotation as JMS;

/**
 * Class QueryParameter
 *
 * @package Epfremmer\SwaggerBundle
 * @subpackage Entity\Parameters
 */
class QueryParameter extends AbstractParameter
{

    /**
     * @JMS\Type("string")
     * @var string
     */
    protected $type;

    /**
     * @JMS\Type("array")
     * @var string[]
     */
    protected $items;

    /**
     * @JMS\Type("string")
     * @var string
     */
    protected $collectionFormat;

    /**
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param string $type
     * @return QueryParameter
     */
    public function setType($type)
    {
        $this->type = $type;
        return $this;
    }

    /**
     * @return \string[]
     */
    public function getItems()
    {
        return $this->items;
    }

    /**
     * @param \string[] $items
     * @return QueryParameter
     */
    public function setItems($items)
    {
        $this->items = $items;
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
     * @return QueryParameter
     */
    public function setCollectionFormat($collectionFormat)
    {
        $this->collectionFormat = $collectionFormat;
        return $this;
    }
}