<?php
/**
 * File IntegerSchema.php
 *
 * @author Edward Pfremmer <epfremme@nerdery.com>
 */
namespace Nerdery\Swagger\Entity\Schemas;

use Nerdery\Swagger\Entity\Mixin\Primitives;

/**
 * Class IntegerSchema
 *
 * @package Nerdery\Swagger
 * @subpackage Entity\Schemas
 */
class IntegerSchema extends AbstractSchema
{
    use Primitives\NumericPrimitiveTrait;

    /**
     * {@inheritdoc}
     */
    public function getType()
    {
        return AbstractSchema::INTEGER_TYPE;
    }
}