<?php
/**
 * File StringHeader.php
 *
 * @author Edward Pfremmer <epfremme@nerdery.com>
 */
namespace Epfremme\Swagger\Entity\Headers;

use Epfremme\Swagger\Entity\Mixin\Primitives;
use JMS\Serializer\Annotation as JMS;

/**
 * Class StringHeader
 *
 * @package Epfremme\Swagger
 * @subpackage Entity\Headers
 */
class StringHeader extends AbstractHeader
{
    use Primitives\StringPrimitiveTrait;

    /**
     * @JMS\Since("2.0")
     * @JMS\Type("string")
     * @JMS\SerializedName("type")
     * @var string
     */
    protected $type = AbstractHeader::STRING_TYPE;

    /**
     * {@inheritdoc}
     */
    public function getType()
    {
        return AbstractHeader::STRING_TYPE;
    }
}
