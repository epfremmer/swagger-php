<?php
/**
 * File Response.php
 *
 * @author Edward Pfremmer <epfremme@nerdery.com>
 */
namespace Epfremmer\SwaggerBundle\Entity;

use Epfremmer\SwaggerBundle\Entity\Headers\AbstractHeader;
use Epfremmer\SwaggerBundle\Entity\Schemas\AbstractSchema;
use JMS\Serializer\Annotation as JMS;

/**
 * Class Response
 *
 * @package Epfremmer\SwaggerBundle
 * @subpackage Entity
 */
class Response
{

    /**
     * @JMS\Type("string")
     * @var string
     */
    protected $description;

    /**
     * @JMS\Type("Epfremmer\SwaggerBundle\Entity\Schemas\AbstractSchema")
     * @var AbstractSchema
     */
    protected $schema;

    /**
     * @JMS\Type("ArrayCollection<string,Epfremmer\SwaggerBundle\Entity\Headers\AbstractHeader>")
     * @var AbstractHeader
     */
    protected $headers;

    /**
     * @JMS\Type("Epfremmer\SwaggerBundle\Entity\Examples")
     * @var string
     */
    protected $examples;

    /**
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param string $description
     * @return Response
     */
    public function setDescription($description)
    {
        $this->description = $description;
        return $this;
    }

    /**
     * @return AbstractSchema
     */
    public function getSchema()
    {
        return $this->schema;
    }

    /**
     * @param AbstractSchema $schema
     * @return Response
     */
    public function setSchema($schema)
    {
        $this->schema = $schema;
        return $this;
    }

    /**
     * @return AbstractHeader
     */
    public function getHeaders()
    {
        return $this->headers;
    }

    /**
     * @param AbstractHeader $headers
     * @return Response
     */
    public function setHeaders($headers)
    {
        $this->headers = $headers;
        return $this;
    }

    /**
     * @return string
     */
    public function getExamples()
    {
        return $this->examples;
    }

    /**
     * @param string $examples
     * @return Response
     */
    public function setExamples($examples)
    {
        $this->examples = $examples;
        return $this;
    }
}