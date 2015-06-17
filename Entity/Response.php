<?php
/**
 * File Response.php
 *
 * @author Edward Pfremmer <epfremme@nerdery.com>
 */
namespace Epfremmer\SwaggerBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Epfremmer\SwaggerBundle\Entity\Schemas\SchemaInterface;
use Epfremmer\SwaggerBundle\Entity\Headers\AbstractHeader;
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
     * @JMS\SerializedName("description")
     * @var string
     */
    protected $description;

    /**
     * @JMS\Type("Epfremmer\SwaggerBundle\Entity\Schemas\AbstractSchema")
     * @JMS\SerializedName("schema")
     * @var SchemaInterface
     */
    protected $schema;

    /**
     * @JMS\Type("ArrayCollection<string,Epfremmer\SwaggerBundle\Entity\Headers\AbstractHeader>")
     * @JMS\SerializedName("headers")
     * @var AbstractHeader[]|ArrayCollection
     */
    protected $headers;

    /**
     * @JMS\Type("Epfremmer\SwaggerBundle\Entity\Examples")
     * @JMS\SerializedName("examples")
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
     * @return SchemaInterface
     */
    public function getSchema()
    {
        return $this->schema;
    }

    /**
     * @param SchemaInterface $schema
     * @return Response
     */
    public function setSchema(SchemaInterface $schema)
    {
        $this->schema = $schema;
        return $this;
    }

    /**
     * @return ArrayCollection|AbstractHeader[]
     */
    public function getHeaders()
    {
        return $this->headers;
    }

    /**
     * @param ArrayCollection|AbstractHeader[] $headers
     * @return Response
     */
    public function setHeaders(ArrayCollection $headers)
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