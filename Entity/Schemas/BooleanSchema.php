<?php
/**
 * File BooleanSchema.php
 *
 * @author Edward Pfremmer <epfremme@nerdery.com>
 */
namespace Epfremmer\SwaggerBundle\Entity\Schemas;

use Epfremmer\SwaggerBundle\Entity\Mixin\Primitives;

/**
 * Class BooleanSchema
 *
 * @package Epfremmer\SwaggerBundle
 * @subpackage Entity\Schemas
 */
class BooleanSchema extends AbstractSchema
{
    use Primitives\BooleanPrimitiveTrait;

    /**
     * {@inheritdoc}
     */
    public function getType()
    {
        return AbstractSchema::BOOLEAN_TYPE;
    }
}