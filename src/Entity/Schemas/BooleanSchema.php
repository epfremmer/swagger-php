<?php
/**
 * File BooleanSchema.php
 *
 * @author Edward Pfremmer <epfremme@nerdery.com>
 */
namespace Epfremme\Swagger\Entity\Schemas;

use Epfremme\Swagger\Entity\Mixin\Primitives;

/**
 * Class BooleanSchema
 *
 * @package Epfremme\Swagger
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
