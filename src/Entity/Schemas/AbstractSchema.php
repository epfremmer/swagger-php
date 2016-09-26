<?php
/**
 * File AbstractSchema.php
 *
 * @author Edward Pfremmer <epfremme@nerdery.com>
 */
namespace Epfremme\Swagger\Entity\Schemas;

use Epfremme\Swagger\Annotations as EP;
use Epfremme\Swagger\Entity\ExternalDocumentation;
use JMS\Serializer\Annotation as JMS;

/**
 * Class AbstractSchema
 *
 * @EP\Discriminator(field = "type", default="object", map = {
 *   "null"   : "Epfremme\Swagger\Entity\Schemas\NullSchema",
 *   "boolean": "Epfremme\Swagger\Entity\Schemas\BooleanSchema",
 *   "integer": "Epfremme\Swagger\Entity\Schemas\IntegerSchema",
 *   "number" : "Epfremme\Swagger\Entity\Schemas\NumberSchema",
 *   "string" : "Epfremme\Swagger\Entity\Schemas\StringSchema",
 *   "array"  : "Epfremme\Swagger\Entity\Schemas\ArraySchema",
 *   "object" : "Epfremme\Swagger\Entity\Schemas\ObjectSchema"
 * })
 *
 * @package Epfremme\Swagger
 * @subpackage Entity\Schemas
 */
abstract class AbstractSchema implements SchemaInterface
{
    // schema types
    const NULL_TYPE    = 'null';
    const BOOLEAN_TYPE = 'boolean';
    const INTEGER_TYPE = 'integer';
    const NUMBER_TYPE  = 'number';
    const STRING_TYPE  = 'string';
    const ARRAY_TYPE   = 'array';
    const OBJECT_TYPE  = 'object';
    const MULTI_TYPE   = 'multi';

    /**
     * @JMS\Since("2.0")
     * @JMS\Type("string")
     * @JMS\SerializedName("type")
     * @var string
     */
    protected $type;

    /**
     * @JMS\Since("2.0")
     * @JMS\Type("string")
     * @JMS\SerializedName("format")
     * @var string
     */
    protected $format;

    /**
     * @JMS\Since("2.0")
     * @JMS\Type("string")
     * @JMS\SerializedName("title")
     * @var string
     */
    protected $title;

    /**
     * @JMS\Since("2.0")
     * @JMS\Type("string")
     * @JMS\SerializedName("description")
     * @var string
     */
    protected $description;

    /**
     * @JMS\Since("2.0")
     * @JMS\Type("string")
     * @JMS\SerializedName("default")
     * @var string
     */
    protected $default;

    /**
     * @JMS\Since("2.0")
     * @JMS\Type("string")
     * @JMS\SerializedName("example")
     * @var string
     */
    protected $example;

    /**
     * @JMS\Since("2.0")
     * @JMS\Type("Epfremme\Swagger\Entity\ExternalDocumentation")
     * @JMS\SerializedName("externalDocs")
     * @var ExternalDocumentation
     */
    protected $externalDocs;

    /**
     * @return string
     */
    public function getFormat()
    {
        return $this->format;
    }

    /**
     * @param string $format
     * @return AbstractSchema
     */
    public function setFormat($format)
    {
        $this->format = $format;
        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * {@inheritdoc}
     */
    public function setTitle($title)
    {
        $this->title = $title;
        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * {@inheritdoc}
     */
    public function setDescription($description)
    {
        $this->description = $description;
        return $this;
    }

    /**
     * @return array
     */
    public function getDefault()
    {
        return $this->default;
    }

    /**
     * @param array $default
     * @return AbstractSchema
     */
    public function setDefault($default)
    {
        $this->default = $default;
        return $this;
    }

    /**
     * @return string
     */
    public function getExample()
    {
        return $this->example;
    }

    /**
     * @param string $example
     * @return AbstractSchema
     */
    public function setExample($example)
    {
        $this->example = $example;
        return $this;
    }

    /**
     * @return ExternalDocumentation
     */
    public function getExternalDocs()
    {
        return $this->externalDocs;
    }

    /**
     * @param ExternalDocumentation $externalDocs
     * @return AbstractSchema
     */
    public function setExternalDocs(ExternalDocumentation $externalDocs)
    {
        $this->externalDocs = $externalDocs;
        return $this;
    }
}
