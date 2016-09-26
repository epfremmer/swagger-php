<?php
/**
 * File MultiSchema.php
 *
 * @author Edward Pfremmer <epfremme@nerdery.com>
 */
namespace Epfremme\Swagger\Entity\Schemas;

use Epfremme\Swagger\Entity\Mixin\Primitives;
use JMS\Serializer\Annotation as JMS;

/**
 * Class MultiSchema
 *
 * @package Epfremme\Swagger
 * @subpackage Entity\Schemas
 */
class MultiSchema extends AbstractSchema
{
    /**
     * @JMS\Since("2.0")
     * @JMS\Type("array")
     * @JMS\SerializedName("type")
     * @var array
     */
    protected $type;

    /**
     * {@inheritdoc}
     */
    public function getType()
    {
        return AbstractSchema::MULTI_TYPE;
    }
}
