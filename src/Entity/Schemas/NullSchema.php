<?php
/**
 * File NullSchema.php
 *
 * @author Edward Pfremmer <epfremme@nerdery.com>
 */
namespace Epfremme\Swagger\Entity\Schemas;

use Epfremme\Swagger\Entity\Mixin\Primitives;

/**
 * Class NullSchema
 *
 * @package Epfremme\Swagger
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
