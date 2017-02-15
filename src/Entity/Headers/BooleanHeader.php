<?php
/**
 * File BooleanHeader.php
 *
 * @author Edward Pfremmer <epfremme@nerdery.com>
 */
namespace Epfremme\Swagger\Entity\Headers;

use Epfremme\Swagger\Entity\Mixin\Primitives;
use JMS\Serializer\Annotation as JMS;

/**
 * Class BooleanHeader
 *
 * @package Epfremme\Swagger
 * @subpackage Entity\Headers
 */
class BooleanHeader extends AbstractHeader
{
    use Primitives\BooleanPrimitiveTrait;

    /**
     * @JMS\Since("2.0")
     * @JMS\Type("string")
     * @JMS\SerializedName("type")
     * @var string
     */
    protected $type = AbstractHeader::BOOLEAN_TYPE;

    /**
     * {@inheritdoc}
     */
    public function getType()
    {
        return AbstractHeader::BOOLEAN_TYPE;
    }
}
