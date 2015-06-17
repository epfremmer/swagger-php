<?php
/**
 * File IntegerSchema.php
 *
 * @author Edward Pfremmer <epfremme@nerdery.com>
 */
namespace Epfremmer\SwaggerBundle\Entity\Schemas;

use Epfremmer\SwaggerBundle\Entity\Mixin\Primitives;

/**
 * Class IntegerSchema
 *
 * @package Epfremmer\SwaggerBundle
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