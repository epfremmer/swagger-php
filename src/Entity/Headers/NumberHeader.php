<?php
/**
 * File NumberHeader.php
 *
 * @author Edward Pfremmer <epfremme@nerdery.com>
 */
namespace Epfremme\Swagger\Entity\Headers;

use Epfremme\Swagger\Entity\Mixin\Primitives;
use JMS\Serializer\Annotation as JMS;

/**
 * Class NumberHeader
 *
 * @package Epfremme\Swagger
 * @subpackage Entity\Headers
 */
class NumberHeader extends AbstractHeader
{
    use Primitives\NumericPrimitiveTrait;

    /**
     * @JMS\Since("2.0")
     * @JMS\Type("string")
     * @JMS\SerializedName("type")
     * @var string
     */
    protected $type = AbstractHeader::NUMBER_TYPE;

    /**
     * {@inheritdoc}
     */
    public function getType()
    {
        return AbstractHeader::NUMBER_TYPE;
    }
}
