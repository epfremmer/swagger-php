<?php
/**
 * File Response.php
 *
 * @author Edward Pfremmer <epfremme@nerdery.com>
 */
namespace Epfremme\Swagger\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Epfremme\Swagger\Entity\Schemas\SchemaInterface;
use Epfremme\Swagger\Entity\Headers\AbstractHeader;
use JMS\Serializer\Annotation as JMS;

/**
 * Class Response
 *
 * @package Epfremme\Swagger
 * @subpackage Entity
 */
class Response
{
    /**
     * @JMS\Since("2.0")
     * @JMS\Type("string")
     * @JMS\SerializedName("description")
     * @var string
     */
    protected $description;

    /**
     * @JMS\Since("2.0")
     * @JMS\Type("Epfremme\Swagger\Entity\Schemas\AbstractSchema")
     * @JMS\SerializedName("schema")
     * @var SchemaInterface
     */
    protected $schema;

    /**
     * @JMS\Since("2.0")
     * @JMS\Type("ArrayCollection<string,Epfremme\Swagger\Entity\Headers\AbstractHeader>")
     * @JMS\SerializedName("headers")
     * @var AbstractHeader[]|ArrayCollection
     */
    protected $headers;

    /**
     * @JMS\Since("2.0")
     * @JMS\Type("Epfremme\Swagger\Entity\Examples")
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
