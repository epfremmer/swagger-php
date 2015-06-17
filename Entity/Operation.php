<?php
/**
 * File Operation.php
 *
 * @author Edward Pfremmer <epfremme@nerdery.com>
 */
namespace Epfremmer\SwaggerBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Epfremmer\SwaggerBundle\Entity\Schemas\SchemaInterface;
use Epfremmer\SwaggerBundle\Entity\Parameters\AbstractParameter;
use JMS\Serializer\Annotation as JMS;

/**
 * Class Operation
 *
 * @package Epfremmer\SwaggerBundle
 * @subpackage Entity
 */
class Operation
{

    /**
     * @JMS\Type("array")
     * @JMS\SerializedName("tags")
     * @var string[]
     */
    protected $tags;

    /**
     * @JMS\Type("string")
     * @JMS\SerializedName("summary")
     * @var string
     */
    protected $summary;

    /**
     * @JMS\Type("string")
     * @JMS\SerializedName("description")
     * @var string
     */
    protected $description;

    /**
     * @JMS\Type("Epfremmer\SwaggerBundle\Entity\ExternalDocumentation")
     * @JMS\SerializedName("externalDocs")
     * @var ExternalDocumentation
     */
    protected $externalDocs;

    /**
     * @JMS\Type("string")
     * @JMS\SerializedName("operationId")
     * @var string
     */
    protected $operationId;

    /**
     * @JMS\Type("array")
     * @JMS\SerializedName("consumes")
     * @var array
     */
    protected $consumes;

    /**
     * @JMS\Type("array")
     * @JMS\SerializedName("produces")
     * @var string[]|array
     */
    protected $produces;

    /**
     * @JMS\Type("ArrayCollection<string,Epfremmer\SwaggerBundle\Entity\Parameters\AbstractParameter>")
     * @JMS\SerializedName("parameters")
     * @var ArrayCollection|AbstractParameter[]
     */
    protected $parameters;

    /**
     * @JMS\Type("ArrayCollection<string,Epfremmer\SwaggerBundle\Entity\Response>")
     * @JMS\SerializedName("responses")
     * @var SchemaInterface[]|ArrayCollection
     */
    protected $responses;

    /**
     * @JMS\Type("array")
     * @JMS\SerializedName("schemes")
     * @var string[]
     */
    protected $schemes;

    /**
     * @JMS\Type("boolean")
     * @JMS\SerializedName("deprecated")
     * @var boolean
     */
    protected $deprecated;

    /**
     * @JMS\Type("ArrayCollection<string,array>")
     * @JMS\SerializedName("security")
     * @var ArrayCollection|string[]
     */
    protected $security;

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
     * @return SchemaInterface[]|ArrayCollection
     */
    public function getResponses()
    {
        return $this->responses;
    }

    /**
     * @param ArrayCollection $responses
     * @return Operation
     */
    public function setResponses($responses)
    {
        $this->responses = $responses;
        return $this;
    }

    /**
     * @return \string[]
     */
    public function getProduces()
    {
        return $this->produces;
    }

    /**
     * @param \string[] $produces
     * @return Operation
     */
    public function setProduces($produces)
    {
        $this->produces = $produces;
        return $this;
    }

}