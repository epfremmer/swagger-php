<?php
/**
 * File ArraySchema.php
 *
 * @author Edward Pfremmer <epfremme@nerdery.com>
 */
namespace Nerdery\Swagger\Entity\Schemas;

use Nerdery\Swagger\Entity\Mixin\Primitives;

/**
 * Class ArraySchema
 *
 * @package Nerdery\Swagger
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