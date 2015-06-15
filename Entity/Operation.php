<?php
/**
 * File Operation.php
 *
 * @author Edward Pfremmer <epfremme@nerdery.com>
 */
namespace Epfremmer\SwaggerBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Epfremmer\SwaggerBundle\Entity\Parameters\AbstractParameter;
use Epfremmer\SwaggerBundle\Entity\Schemas\AbstractSchema;
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
     * @var string[]
     */
    protected $tags;

    /**
     * @JMS\Type("string")
     * @var string
     */
    protected $summary;

    /**
     * @JMS\Type("string")
     * @var string
     */
    protected $description;

    /**
     * @JMS\Type("Epfremmer\SwaggerBundle\Entity\ExternalDocumentation")
     * @var ExternalDocumentation
     */
    protected $externalDocs;

    /**
     * @JMS\Type("string")
     * @var string
     */
    protected $operationId;

    /**
     * @JMS\Type("array")
     * @var array
     */
    protected $consumes;

    /**
     * @JMS\Type("array")
     * @var string[]|array
     */
    protected $produces;

    /**
     * @JMS\Type("ArrayCollection<string,Epfremmer\SwaggerBundle\Entity\Parameters\AbstractParameter>")
     * @var ArrayCollection|AbstractParameter[]
     */
    protected $parameters;

    /**
     * @JMS\Type("ArrayCollection<string,Epfremmer\SwaggerBundle\Entity\Response>")
     * @var AbstractSchema[]|ArrayCollection
     */
    protected $responses;

    /**
     * @JMS\Type("array")
     * @var string[]
     */
    protected $schemes;

    /**
     * @JMS\Type("boolean")
     * @var boolean
     */
    protected $deprecated;

    /**
     * @JMS\Type("ArrayCollection<string,array>")
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
     * @return AbstractSchema[]|ArrayCollection
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