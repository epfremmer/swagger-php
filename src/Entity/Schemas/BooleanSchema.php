<?php
/**
 * File BooleanSchema.php
 *
 * @author Edward Pfremmer <epfremme@nerdery.com>
 */
namespace Nerdery\Swagger\Entity\Schemas;

use Nerdery\Swagger\Entity\Mixin\Primitives;

/**
 * Class BooleanSchema
 *
 * @package Nerdery\Swagger
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