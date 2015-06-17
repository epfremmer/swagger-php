<?php
/**
 * File BodyParameter.php
 *
 * @author Edward Pfremmer <epfremme@nerdery.com>
 */
namespace Epfremmer\SwaggerBundle\Entity\Parameters;

use Epfremmer\SwaggerBundle\Entity\Schemas\AbstractSchema;
use JMS\Serializer\Annotation as JMS;

/**
 * Class BodyParameter
 *
 * @package Epfremmer\SwaggerBundle
 * @subpackage Entity\Parameters
 */
class BodyParameter extends AbstractParameter
{

    /**
     * @JMS\Type("Epfremmer\SwaggerBundle\Entity\Schemas\AbstractSchema")
     * @JMS\SerializedName("schema")
     * @var AbstractSchema
     */
    protected $schema;

    /**
     * @return AbstractSchema
     */
    public function getSchema()
    {
        return $this->schema;
    }

    /**
     * @param AbstractSchema $schema
     * @return AbstractParameter
     */
    public function setSchema(AbstractSchema $schema)
    {
        $this->schema = $schema;
        return $this;
    }
}