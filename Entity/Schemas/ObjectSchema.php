<?php
/**
 * File ObjectSchema.php
 *
 * @author Edward Pfremmer <epfremme@nerdery.com>
 */
namespace Epfremmer\SwaggerBundle\Entity\Schemas;

/**
 * Class ObjectSchema
 *
 * @package Epfremmer\SwaggerBundle
 * @subpackage Entity\Schemas
 */
class ObjectSchema extends AbstractSchema
{
    use Primitives\ObjectPrimitive;

    /**
     * {@inheritdoc}
     */
    public function getType()
    {
        return AbstractSchema::OBJECT_TYPE;
    }
}