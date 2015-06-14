<?php
/**
 * File NumberSchema.php
 *
 * @author Edward Pfremmer <epfremme@nerdery.com>
 */
namespace Epfremmer\SwaggerBundle\Entity\Schemas;

/**
 * Class NumberSchema
 *
 * @package Epfremmer\SwaggerBundle
 * @subpackage Entity\Schemas
 */
class NumberSchema extends AbstractSchema
{
    use Primitives\NumericPrimitive;

    /**
     * {@inheritdoc}
     */
    public function getType()
    {
        return AbstractSchema::NUMBER_TYPE;
    }
}