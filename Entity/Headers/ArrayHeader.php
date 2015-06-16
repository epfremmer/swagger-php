<?php
/**
 * File ArrayHeader.php
 *
 * @author Edward Pfremmer <epfremme@nerdery.com>
 */
namespace Epfremmer\SwaggerBundle\Entity\Headers;

use Epfremmer\SwaggerBundle\Entity\Mixin\Primitives;
use JMS\Serializer\Annotation as JMS;

/**
 * Class ArrayHeader
 *
 * @package Epfremmer\SwaggerBundle
 * @subpackage Entity\Headers
 */
class ArrayHeader extends AbstractHeader
{
    use Primitives\ArrayPrimitiveTrait;

    /**
     * @JMS\Type("string")
     * @JMS\SerializedName("collectionFormat")
     * @var string
     */
    protected $collectionFormat;

    /**
     * {@inheritdoc}
     */
    public function getType()
    {
        return AbstractHeader::ARRAY_TYPE;
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
     * @return ArrayHeader
     */
    public function setCollectionFormat($collectionFormat)
    {
        $this->collectionFormat = $collectionFormat;
        return $this;
    }
}