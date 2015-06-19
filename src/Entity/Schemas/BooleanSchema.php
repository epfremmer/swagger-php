<?php
/**
 * File BooleanSchema.php
 *
 * @author Edward Pfremmer <epfremme@nerdery.com>
 */
namespace ERP\Swagger\Entity\Schemas;

use ERP\Swagger\Entity\Mixin\Primitives;

/**
 * Class BooleanSchema
 *
 * @package ERP\Swagger
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