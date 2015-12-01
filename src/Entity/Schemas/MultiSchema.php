<?php
/**
 * File MultiSchema.php
 *
 * @author Edward Pfremmer <epfremme@nerdery.com>
 */
namespace Nerdery\Swagger\Entity\Schemas;

use Nerdery\Swagger\Entity\Mixin\Primitives;
use JMS\Serializer\Annotation as JMS;

/**
 * Class MultiSchema
 *
 * @package Nerdery\Swagger
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
