<?php
/**
 * File ArraySchema.php
 *
 * @author Edward Pfremmer <epfremme@nerdery.com>
 */
namespace ERP\Swagger\Entity\Schemas;

use ERP\Swagger\Entity\Mixin\Primitives;

/**
 * Class ArraySchema
 *
 * @package ERP\Swagger
 * @subpackage Entity\Schemas
 */
class ArraySchema extends AbstractSchema
{
    use Primitives\ArrayPrimitiveTrait;

    /**
     * {@inheritdoc}
     */
    public function getType()
    {
        return AbstractSchema::ARRAY_TYPE;
    }
}