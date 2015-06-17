<?php
/**
 * File BodyParameter.php
 *
 * @author Edward Pfremmer <epfremme@nerdery.com>
 */
namespace Epfremmer\SwaggerBundle\Entity\Parameters;

use Epfremmer\SwaggerBundle\Entity\Schemas\SchemaInterface;
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
     * @var SchemaInterface
     */
    protected $schema;

    /**
     * @return SchemaInterface
     */
    public function getSchema()
    {
        return $this->schema;
    }

    /**
     * @param SchemaInterface $schema
     * @return AbstractParameter
     */
    public function setSchema(SchemaInterface $schema)
    {
        $this->schema = $schema;
        return $this;
    }
}