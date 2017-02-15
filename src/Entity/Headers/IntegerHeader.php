<?php
/**
 * File IntegerHeader.php
 *
 * @author Edward Pfremmer <epfremme@nerdery.com>
 */
namespace Epfremme\Swagger\Entity\Headers;

use Epfremme\Swagger\Entity\Mixin\Primitives;
use JMS\Serializer\Annotation as JMS;

/**
 * Class IntegerHeader
 *
 * @package Epfremme\Swagger
 * @subpackage Entity\Headers
 */
class IntegerHeader extends AbstractHeader
{
    use Primitives\NumericPrimitiveTrait;

    /**
     * @JMS\Since("2.0")
     * @JMS\Type("string")
     * @JMS\SerializedName("type")
     * @var string
     */
    protected $type = AbstractHeader::INTEGER_TYPE;

    /**
     * {@inheritdoc}
     */
    public function getType()
    {
        return AbstractHeader::INTEGER_TYPE;
    }
}
