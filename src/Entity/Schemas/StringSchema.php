<?php
/**
 * File RefSchema.php
 *
 * @author Edward Pfremmer <epfremme@nerdery.com>
 */
namespace Nerdery\Swagger\Entity\Schemas;

use Nerdery\Swagger\Entity\Mixin\Primitives;

/**
 * Class RefSchema
 *
 * @package Nerdery\Swagger
 * @subpackage Entity\Schemas
 */
class StringSchema extends AbstractSchema
{
    use Primitives\StringPrimitiveTrait;

    /**
     * {@inheritdoc}
     */
    public function getType()
    {
        return AbstractSchema::STRING_TYPE;
    }
}