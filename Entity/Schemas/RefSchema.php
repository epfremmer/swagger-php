<?php
/**
 * File RefSchema.php
 *
 * @author Edward Pfremmer <epfremme@nerdery.com>
 */
namespace Epfremmer\SwaggerBundle\Entity\Schemas;

use Epfremmer\SwaggerBundle\Entity\Mixin\Primitives;
use JMS\Serializer\Annotation as JMS;

/**
 * Class RefSchema
 *
 * @package Epfremmer\SwaggerBundle
 * @subpackage Entity\Schemas
 */
class RefSchema extends AbstractSchema
{
    use Primitives\AnyPrimitiveTrait;

    /**
     * @JMS\Type("string")
     * @JMS\SerializedName("$ref")
     * @var string
     */
    protected $ref;

    /**
     * @return string
     */
    public function getRef()
    {
        return $this->ref;
    }

    /**
     * @param string $ref
     * @return AbstractSchema
     */
    public function setRef($ref)
    {
        $this->ref = $ref;
        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getType()
    {
        return AbstractSchema::REF_TYPE;
    }
}