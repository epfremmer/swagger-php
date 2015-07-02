<?php
/**
 * File NullSchema.php
 *
 * @author Edward Pfremmer <epfremme@nerdery.com>
 */
namespace Nerdery\Swagger\Entity\Schemas;

use Nerdery\Swagger\Entity\Mixin\Primitives;

/**
 * Class NullSchema
 *
 * @package Nerdery\Swagger
 * @subpackage Entity\Schemas
 */
class NullSchema extends AbstractSchema
{
    use Primitives\NullPrimitiveTrait;

    /**
     * {@inheritdoc}
     */
    public function getType()
    {
        return AbstractSchema::NULL_TYPE;
    }
}