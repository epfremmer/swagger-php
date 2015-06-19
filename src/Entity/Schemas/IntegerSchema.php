<?php
/**
 * File IntegerSchema.php
 *
 * @author Edward Pfremmer <epfremme@nerdery.com>
 */
namespace ERP\Swagger\Entity\Schemas;

use ERP\Swagger\Entity\Mixin\Primitives;

/**
 * Class IntegerSchema
 *
 * @package ERP\Swagger
 * @subpackage Entity\Schemas
 */
class IntegerSchema extends AbstractSchema
{
    use Primitives\NumericPrimitiveTrait;

    /**
     * {@inheritdoc}
     */
    public function getType()
    {
        return AbstractSchema::INTEGER_TYPE;
    }
}