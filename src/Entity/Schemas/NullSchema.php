<?php
/**
 * File NullSchema.php
 *
 * @author Edward Pfremmer <epfremme@nerdery.com>
 */
namespace ERP\Swagger\Entity\Schemas;

use ERP\Swagger\Entity\Mixin\Primitives;

/**
 * Class NullSchema
 *
 * @package ERP\Swagger
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