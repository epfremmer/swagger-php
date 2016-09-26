<?php
/**
 * File BodyParameter.php
 *
 * @author Edward Pfremmer <epfremme@nerdery.com>
 */
namespace Epfremme\Swagger\Entity\Parameters;

use Epfremme\Swagger\Entity\Schemas\SchemaInterface;
use JMS\Serializer\Annotation as JMS;

/**
 * Class BodyParameter
 *
 * @package Epfremme\Swagger
 * @subpackage Entity\Parameters
 */
class BodyParameter extends AbstractParameter
{
    /**
     * @JMS\Since("2.0")
     * @JMS\Type("Epfremme\Swagger\Entity\Schemas\AbstractSchema")
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
