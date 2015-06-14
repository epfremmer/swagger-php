<?php
/**
 * File IntegerSchema.php
 *
 * @author Edward Pfremmer <epfremme@nerdery.com>
 */
namespace Epfremmer\SwaggerBundle\Entity\Schemas;

/**
 * Class IntegerSchema
 *
 * @package Epfremmer\SwaggerBundle
 * @subpackage Entity\Schemas
 */
class IntegerSchema extends AbstractSchema
{
    use Primitives\NumericPrimitive;

    /**
     * {@inheritdoc}
     */
    public function getType()
    {
        return AbstractSchema::INTEGER_TYPE;
    }
}