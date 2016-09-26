<?php
/**
 * File ObjectSchema.php
 *
 * @author Edward Pfremmer <epfremme@nerdery.com>
 */
namespace Epfremme\Swagger\Entity\Schemas;

use Epfremme\Swagger\Entity\Mixin\Primitives;

/**
 * Class ObjectSchema
 *
 * @package Epfremme\Swagger
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
