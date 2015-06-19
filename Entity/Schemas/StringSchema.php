<?php
/**
 * File RefSchema.php
 *
 * @author Edward Pfremmer <epfremme@nerdery.com>
 */
namespace ERP\Swagger\Entity\Schemas;

use ERP\Swagger\Entity\Mixin\Primitives;

/**
 * Class RefSchema
 *
 * @package ERP\Swagger
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