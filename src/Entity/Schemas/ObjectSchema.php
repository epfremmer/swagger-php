<?php
/**
 * File ObjectSchema.php
 *
 * @author Edward Pfremmer <epfremme@nerdery.com>
 */
namespace ERP\Swagger\Entity\Schemas;

use ERP\Swagger\Entity\Mixin\Primitives;

/**
 * Class ObjectSchema
 *
 * @package ERP\Swagger
 * @subpackage Entity\Schemas
 */
class ObjectSchema extends AbstractSchema
{
    use Primitives\ObjectPrimitiveTrait;

    /**
     * {@inheritdoc}
     */
    public function getType()
    {
        return AbstractSchema::OBJECT_TYPE;
    }
}