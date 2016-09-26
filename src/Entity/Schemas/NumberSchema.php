<?php
/**
 * File NumberSchema.php
 *
 * @author Edward Pfremmer <epfremme@nerdery.com>
 */
namespace Epfremme\Swagger\Entity\Schemas;

use Epfremme\Swagger\Entity\Mixin\Primitives;

/**
 * Class NumberSchema
 *
 * @package Epfremme\Swagger
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
