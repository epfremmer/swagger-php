<?php
/**
 * File ObjectSchema.php
 *
 * @author Edward Pfremmer <epfremme@nerdery.com>
 */
namespace Nerdery\Swagger\Entity\Schemas;

use Nerdery\Swagger\Entity\Mixin\Primitives;

/**
 * Class ObjectSchema
 *
 * @package Nerdery\Swagger
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