<?php
/**
 * File NumberSchema.php
 *
 * @author Edward Pfremmer <epfremme@nerdery.com>
 */
namespace ERP\Swagger\Entity\Schemas;

use ERP\Swagger\Entity\Mixin\Primitives;

/**
 * Class NumberSchema
 *
 * @package ERP\Swagger
 * @subpackage Entity\Schemas
 */
class NumberSchema extends AbstractSchema
{
    use Primitives\NumericPrimitiveTrait;

    /**
     * {@inheritdoc}
     */
    public function getType()
    {
        return AbstractSchema::NUMBER_TYPE;
    }
}