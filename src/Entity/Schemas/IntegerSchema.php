<?php
/**
 * File IntegerSchema.php
 *
 * @author Edward Pfremmer <epfremme@nerdery.com>
 */
namespace Epfremme\Swagger\Entity\Schemas;

use Epfremme\Swagger\Entity\Mixin\Primitives;

/**
 * Class IntegerSchema
 *
 * @package Epfremme\Swagger
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
