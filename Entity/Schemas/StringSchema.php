<?php
/**
 * File RefSchema.php
 *
 * @author Edward Pfremmer <epfremme@nerdery.com>
 */
namespace Epfremmer\SwaggerBundle\Entity\Schemas;

/**
 * Class RefSchema
 *
 * @package Epfremmer\SwaggerBundle
 * @subpackage Entity\Schemas
 */
class StringSchema extends AbstractSchema
{
    use Primitives\StringPrimitive;

    /**
     * {@inheritdoc}
     */
    public function getType()
    {
        return AbstractSchema::STRING_TYPE;
    }
}