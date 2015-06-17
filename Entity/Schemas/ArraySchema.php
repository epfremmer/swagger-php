<?php
/**
 * File ArraySchema.php
 *
 * @author Edward Pfremmer <epfremme@nerdery.com>
 */
namespace Epfremmer\SwaggerBundle\Entity\Schemas;

use Epfremmer\SwaggerBundle\Entity\Mixin\Primitives;

/**
 * Class ArraySchema
 *
 * @package Epfremmer\SwaggerBundle
 * @subpackage Entity\Schemas
 */
class ArraySchema extends AbstractSchema
{
    use Primitives\ArrayPrimitiveTrait;

    /**
     * {@inheritdoc}
     */
    public function getType()
    {
        return AbstractSchema::ARRAY_TYPE;
    }
}