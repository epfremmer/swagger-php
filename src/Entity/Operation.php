<?php
/**
 * File Operation.php
 *
 * @author Edward Pfremmer <epfremme@nerdery.com>
 */
namespace Epfremme\Swagger\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Epfremme\Swagger\Entity\Schemas\SchemaInterface;
use Epfremme\Swagger\Entity\Parameters\AbstractParameter;
use JMS\Serializer\Annotation as JMS;

/**
 * Class Operation
 *
 * @package Epfremme\Swagger
 * @subpackage Entity
 */
class Operation
{
    /**
     * @JMS\Since("2.0")
     * @JMS\Type("array")
     * @JMS\SerializedName("tags")
     * @var string[]
     */
    protected $tags;

    /**
     * @JMS\Since("2.0")
     * @JMS\Type("string")
     * @JMS\SerializedName("summary")
     * @var string
     */
    protected $summary;

    /**
     * @JMS\Since("2.0")
     * @JMS\Type("string")
     * @JMS\SerializedName("description")
     * @var string
     */
    protected $description;

    /**
     * @JMS\Since("2.0")
     * @JMS\Type("Epfremme\Swagger\Entity\ExternalDocumentation")
     * @JMS\SerializedName("externalDocs")
     * @var ExternalDocumentation
     */
    protected $externalDocs;

    /**
     * @JMS\Since("2.0")
     * @JMS\Type("string")
     * @JMS\SerializedName("operationId")
     * @var string
     */
    protected $operationId;

    /**
     * @JMS\Since("2.0")
     * @JMS\Type("array")
     * @JMS\SerializedName("consumes")
     * @var array
     */
    protected $consumes;

    /**
     * @JMS\Since("2.0")
     * @JMS\Type("array")
     * @JMS\SerializedName("produces")
     * @var string[]|array
     */
    protected $produces;

    /**
     * @JMS\Since("2.0")
     * @JMS\Type("ArrayCollection<string,Epfremme\Swagger\Entity\Parameters\AbstractParameter>")
     * @JMS\SerializedName("parameters")
     * @var ArrayCollection|AbstractParameter[]
     */
    protected $parameters;

    /**
     * @JMS\Since("2.0")
     * @JMS\Type("ArrayCollection<string,Epfremme\Swagger\Entity\Response>")
     * @JMS\SerializedName("responses")
     * @var SchemaInterface[]|ArrayCollection
     */
    protected $responses;

    /**
     * @JMS\Since("2.0")
     * @JMS\Type("array")
     * @JMS\SerializedName("schemes")
     * @var string[]
     */
    protected $schemes;

    /**
     * @JMS\Since("2.0")
     * @JMS\Type("boolean")
     * @JMS\SerializedName("deprecated")
     * @var boolean
     */
    protected $deprecated;

    /**
     * @JMS\Since("2.0")
     * @JMS\Type("ArrayCollection<string,array>")
     * @JMS\SerializedName("security")
     * @var ArrayCollection|string[]
     */
    protected $security;

    /**
     * @return \string[]
     */
    public function getTags()
    {
        return $this->tags;
    }

    /**
     * @param \string[] $tags
     * @return Operation
     */
    public function setTags($tags)
    {
        $this->tags = $tags;
        return $this;
    }

    /**
     * @return string
     */
    public function getSummary()
    {
        return $this->summary;
    }

    /**
     * @param string $summary
     * @return Operation
     */
    public function setSummary($summary)
    {
        $this->summary = $summary;
        return $this;
    }

    /**
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param string $description
     * @return Operation
     */
    public function setDescription($description)
    {
        $this->description = $description;
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
     * @return Operation
     */
    public function setExternalDocs(ExternalDocumentation $externalDocs)
    {
        $this->externalDocs = $externalDocs;
        return $this;
    }

    /**
     * @return string
     */
    public function getOperationId()
    {
        return $this->operationId;
    }

    /**
     * @param string $operationId
     * @return Operation
     */
    public function setOperationId($operationId)
    {
        $this->operationId = $operationId;
        return $this;
    }

    /**
     * @return array
     */
    public function getConsumes()
    {
        return $this->consumes;
    }

    /**
     * @param array $consumes
     * @return Operation
     */
    public function setConsumes($consumes)
    {
        $this->consumes = $consumes;
        return $this;
    }

    /**
     * @return array|\string[]
     */
    public function getProduces()
    {
        return $this->produces;
    }

    /**
     * @param array|\string[] $produces
     * @return Operation
     */
    public function setProduces($produces)
    {
        $this->produces = $produces;
        return $this;
    }

    /**
     * @return ArrayCollection|Parameters\AbstractParameter[]
     */
    public function getParameters()
    {
        return $this->parameters;
    }

    /**
     * @param ArrayCollection|Parameters\AbstractParameter[] $parameters
     * @return Operation
     */
    public function setParameters(ArrayCollection $parameters)
    {
        $this->parameters = $parameters;
        return $this;
    }

    /**
     * @return ArrayCollection|Schemas\SchemaInterface[]
     */
    public function getResponses()
    {
        return $this->responses;
    }

    /**
     * @param ArrayCollection|Schemas\SchemaInterface[] $responses
     * @return Operation
     */
    public function setResponses(ArrayCollection $responses)
    {
        $this->responses = $responses;
        return $this;
    }

    /**
     * @return \string[]
     */
    public function getSchemes()
    {
        return $this->schemes;
    }

    /**
     * @param \string[] $schemes
     * @return Operation
     */
    public function setSchemes($schemes)
    {
        $this->schemes = $schemes;
        return $this;
    }

    /**
     * @return boolean
     */
    public function isDeprecated()
    {
        return $this->deprecated;
    }

    /**
     * @param boolean $deprecated
     * @return Operation
     */
    public function setDeprecated($deprecated)
    {
        $this->deprecated = $deprecated;
        return $this;
    }

    /**
     * @return ArrayCollection|\string[]
     */
    public function getSecurity()
    {
        return $this->security;
    }

    /**
     * @param ArrayCollection|\string[] $security
     * @return Operation
     */
    public function setSecurity(ArrayCollection $security)
    {
        $this->security = $security;
        return $this;
    }
}
