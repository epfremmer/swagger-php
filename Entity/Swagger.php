<?php
/**
 * File Swagger.php
 *
 * @author Edward Pfremmer <epfremme@nerdery.com>
 */
namespace Epfremmer\SwaggerBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Epfremmer\SwaggerBundle\Entity\Schemas\SchemaInterface;
use Epfremmer\SwaggerBundle\Entity\Parameters\AbstractParameter;
use JMS\Serializer\Annotation as JMS;

/**
 * Class Swagger
 *
 * @package Epfremmer\SwaggerBundle
 * @subpackage Entity
 */
class Swagger
{

    /**
     * @JMS\Type("string")
     * @JMS\SerializedName("swagger")
     * @var string
     */
    protected $version;

    /**
     * @JMS\Type("Epfremmer\SwaggerBundle\Entity\Info")
     * @JMS\SerializedName("info")
     * @var Info
     */
    protected $info;

    /**
     * @JMS\Type("string")
     * @JMS\SerializedName("host")
     * @var string
     */
    protected $host;

    /**
     * @JMS\Type("string")
     * @JMS\SerializedName("basePath")
     * @var string
     */
    protected $basePath;

    /**
     * @JMS\Type("array")
     * @JMS\SerializedName("schemes")
     * @var array
     */
    protected $schemes;

    /**
     * @JMS\Type("array")
     * @JMS\SerializedName("consumes")
     * @var string[]
     */
    protected $consumes;

    /**
     * @JMS\Type("array")
     * @JMS\SerializedName("produces")
     * @var string[]
     */
    protected $produces;

    /**
     * @JMS\Type("ArrayCollection<string,Epfremmer\SwaggerBundle\Entity\Path>")
     * @JMS\SerializedName("paths")
     * @var ArrayCollection|Path[]
     */
    protected $paths;

    /**
     * @JMS\Type("ArrayCollection<string,Epfremmer\SwaggerBundle\Entity\Schemas\AbstractSchema>")
     * @JMS\SerializedName("definitions")
     * @var ArrayCollection|SchemaInterface[]
     */
    protected $definitions;

    /**
     * @JMS\Type("ArrayCollection<string,Epfremmer\SwaggerBundle\Entity\Parameters\AbstractParameter>")
     * @JMS\SerializedName("parameters")
     * @var ArrayCollection|AbstractParameter[]
     */
    protected $parameters;

    /**
     * @JMS\Type("ArrayCollection<string,Epfremmer\SwaggerBundle\Entity\Response>")
     * @JMS\SerializedName("responses")
     * @var ArrayCollection|Response[]
     */
    protected $responses;

    /**
     * @JMS\Type("ArrayCollection<string,Epfremmer\SwaggerBundle\Entity\SecurityDefinition>")
     * @JMS\SerializedName("securityDefinitions")
     * @var ArrayCollection|SecurityDefinition[]
     */
    protected $securityDefinitions;

    /**
     * @JMS\Type("ArrayCollection<string,array>")
     * @JMS\SerializedName("security")
     * @var ArrayCollection|string[]
     */
    protected $security;

    /**
     * @JMS\Type("ArrayCollection<string,Epfremmer\SwaggerBundle\Entity\Tag>")
     * @JMS\SerializedName("tags")
     * @var ArrayCollection|Tag[]
     */
    protected $tags;

    /**
     * @JMS\Type("Epfremmer\SwaggerBundle\Entity\ExternalDocumentation")
     * @JMS\SerializedName("externalDocs")
     * @var ExternalDocumentation
     */
    protected $externalDocs;

    /**
     * @return string
     */
    public function getVersion()
    {
        return $this->version;
    }

    /**
     * @param string $version
     * @return Swagger
     */
    public function setVersion($version)
    {
        $this->version = $version;
        return $this;
    }

    /**
     * @return Info
     */
    public function getInfo()
    {
        return $this->info;
    }

    /**
     * @param Info $info
     * @return Swagger
     */
    public function setInfo(Info $info)
    {
        $this->info = $info;
        return $this;
    }

    /**
     * @return string
     */
    public function getHost()
    {
        return $this->host;
    }

    /**
     * @param string $host
     * @return Swagger
     */
    public function setHost($host)
    {
        $this->host = $host;
        return $this;
    }

    /**
     * @return string
     */
    public function getBasePath()
    {
        return $this->basePath;
    }

    /**
     * @param string $basePath
     * @return Swagger
     */
    public function setBasePath($basePath)
    {
        $this->basePath = $basePath;
        return $this;
    }

    /**
     * @return array
     */
    public function getSchemes()
    {
        return $this->schemes;
    }

    /**
     * @param array $schemes
     * @return Swagger
     */
    public function setSchemes($schemes)
    {
        $this->schemes = $schemes;
        return $this;
    }

    /**
     * @return \string[]
     */
    public function getConsumes()
    {
        return $this->consumes;
    }

    /**
     * @param \string[] $consumes
     * @return Swagger
     */
    public function setConsumes($consumes)
    {
        $this->consumes = $consumes;
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
     * @return Swagger
     */
    public function setProduces($produces)
    {
        $this->produces = $produces;
        return $this;
    }

    /**
     * @return ArrayCollection|Path[]
     */
    public function getPaths()
    {
        return $this->paths;
    }

    /**
     * @param ArrayCollection|Path[] $paths
     * @return Swagger
     */
    public function setPaths(ArrayCollection $paths)
    {
        $this->paths = $paths;
        return $this;
    }

    /**
     * @return ArrayCollection|Schemas\SchemaInterface[]
     */
    public function getDefinitions()
    {
        return $this->definitions;
    }

    /**
     * @param ArrayCollection|Schemas\SchemaInterface[] $definitions
     * @return Swagger
     */
    public function setDefinitions(ArrayCollection $definitions)
    {
        $this->definitions = $definitions;
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
     * @return Swagger
     */
    public function setParameters(ArrayCollection $parameters)
    {
        $this->parameters = $parameters;
        return $this;
    }

    /**
     * @return ArrayCollection|Response[]
     */
    public function getResponses()
    {
        return $this->responses;
    }

    /**
     * @param ArrayCollection|Response[] $responses
     * @return Swagger
     */
    public function setResponses(ArrayCollection $responses)
    {
        $this->responses = $responses;
        return $this;
    }

    /**
     * @return ArrayCollection|SecurityDefinition[]
     */
    public function getSecurityDefinitions()
    {
        return $this->securityDefinitions;
    }

    /**
     * @param ArrayCollection|SecurityDefinition[] $securityDefinitions
     * @return Swagger
     */
    public function setSecurityDefinitions(ArrayCollection $securityDefinitions)
    {
        $this->securityDefinitions = $securityDefinitions;
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
     * @return Swagger
     */
    public function setSecurity(ArrayCollection $security)
    {
        $this->security = $security;
        return $this;
    }

    /**
     * @return ArrayCollection|Tag[]
     */
    public function getTags()
    {
        return $this->tags;
    }

    /**
     * @param ArrayCollection|Tag[] $tags
     * @return Swagger
     */
    public function setTags(ArrayCollection $tags)
    {
        $this->tags = $tags;
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
     * @return Swagger
     */
    public function setExternalDocs(ExternalDocumentation $externalDocs)
    {
        $this->externalDocs = $externalDocs;
        return $this;
    }
}