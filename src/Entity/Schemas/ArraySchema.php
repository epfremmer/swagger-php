<?php
/**
 * File ArraySchema.php
 *
 * @author Edward Pfremmer <epfremme@nerdery.com>
 */
namespace Epfremme\Swagger\Entity\Schemas;

use Epfremme\Swagger\Entity\Mixin\Primitives;

/**
 * Class ArraySchema
 *
 * @package Epfremme\Swagger
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
