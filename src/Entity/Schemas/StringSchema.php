<?php
/**
 * File RefSchema.php
 *
 * @author Edward Pfremmer <epfremme@nerdery.com>
 */
namespace Epfremme\Swagger\Entity\Schemas;

use Epfremme\Swagger\Entity\Mixin\Primitives;

/**
 * Class RefSchema
 *
 * @package Epfremme\Swagger
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
