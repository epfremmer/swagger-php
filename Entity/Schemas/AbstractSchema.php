<?php
/**
 * File AbstractSchema.php
 *
 * @author Edward Pfremmer <epfremme@nerdery.com>
 */
namespace Epfremmer\SwaggerBundle\Entity\Schemas;

use Epfremmer\SwaggerBundle\Entity\ExternalDocumentation;
use JMS\Serializer\Annotation as JMS;

/**
 * Class AbstractSchema
 *
 * @JMS\Discriminator(field = "type", map = {
 *   "null"   : "Epfremmer\SwaggerBundle\Entity\Schemas\NullSchema",
 *   "boolean": "Epfremmer\SwaggerBundle\Entity\Schemas\BooleanSchema",
 *   "integer": "Epfremmer\SwaggerBundle\Entity\Schemas\IntegerSchema",
 *   "number" : "Epfremmer\SwaggerBundle\Entity\Schemas\NumberSchema",
 *   "string" : "Epfremmer\SwaggerBundle\Entity\Schemas\StringSchema",
 *   "array"  : "Epfremmer\SwaggerBundle\Entity\Schemas\ArraySchema",
 *   "object" : "Epfremmer\SwaggerBundle\Entity\Schemas\ObjectSchema"
 * })
 *
 * @package Epfremmer\SwaggerBundle
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

    /**
     * @JMS\Type("string")
     * @JMS\SerializedName("format")
     * @var string
     */
    protected $format;

    /**
     * @JMS\Type("string")
     * @JMS\SerializedName("title")
     * @var string
     */
    protected $title;

    /**
     * @JMS\Type("string")
     * @JMS\SerializedName("description")
     * @var string
     */
    protected $description;

    /**
     * @JMS\Type("string")
     * @JMS\SerializedName("default")
     * @var array
     */
    protected $default;

    /**
     * @JMS\Type("string")
     * @JMS\SerializedName("example")
     * @var string
     */
    protected $example;

    /**
     * @JMS\Type("Epfremmer\SwaggerBundle\Entity\ExternalDocumentation")
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