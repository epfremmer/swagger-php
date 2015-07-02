<?php
/**
 * File NumberSchema.php
 *
 * @author Edward Pfremmer <epfremme@nerdery.com>
 */
namespace Nerdery\Swagger\Entity\Schemas;

use Nerdery\Swagger\Entity\Mixin\Primitives;

/**
 * Class NumberSchema
 *
 * @package Nerdery\Swagger
 * @subpackage Entity\Schemas
 */
class NumberSchema extends AbstractSchema
{
    use Primitives\NumericPrimitiveTrait;

    /**
     * {@inheritdoc}
     */
    public function getType()
    {
        return AbstractSchema::NUMBER_TYPE;
    }
}