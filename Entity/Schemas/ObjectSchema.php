<?php
/**
 * File ObjectSchema.php
 *
 * @author Edward Pfremmer <epfremme@nerdery.com>
 */
namespace Epfremmer\SwaggerBundle\Entity\Schemas;

use Epfremmer\SwaggerBundle\Entity\Mixin\Primitives;

/**
 * Class ObjectSchema
 *
 * @package Epfremmer\SwaggerBundle
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