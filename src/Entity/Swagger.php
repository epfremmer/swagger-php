<?php
/**
 * File Swagger.php
 *
 * @author Edward Pfremmer <epfremme@nerdery.com>
 */
namespace Epfremme\Swagger\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Epfremme\Swagger\Entity\Schemas\SchemaInterface;
use Epfremme\Swagger\Entity\Parameters\AbstractParameter;
use Epfremme\Swagger\Exception\InvalidVersionException;
use Epfremme\Swagger\Parser\SwaggerParser;
use JMS\Serializer\Annotation as JMS;

/**
 * Class Swagger
 *
 * @package Epfremme\Swagger
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
     * @JMS\Since("2.0")
     * @JMS\Type("Epfremme\Swagger\Entity\Info")
     * @JMS\SerializedName("info")
     * @var Info
     */
    protected $info;

    /**
     * @JMS\Since("2.0")
     * @JMS\Type("string")
     * @JMS\SerializedName("host")
     * @var string
     */
    protected $host;

    /**
     * @JMS\Since("2.0")
     * @JMS\Type("string")
     * @JMS\SerializedName("basePath")
     * @var string
     */
    protected $basePath;

    /**
     * @JMS\Since("2.0")
     * @JMS\Type("array")
     * @JMS\SerializedName("schemes")
     * @var array
     */
    protected $schemes;

    /**
     * @JMS\Since("2.0")
     * @JMS\Type("array")
     * @JMS\SerializedName("consumes")
     * @var string[]
     */
    protected $consumes;

    /**
     * @JMS\Since("2.0")
     * @JMS\Type("array")
     * @JMS\SerializedName("produces")
     * @var string[]
     */
    protected $produces;

    /**
     * @JMS\Since("2.0")
     * @JMS\Type("ArrayCollection<string,Epfremme\Swagger\Entity\Path>")
     * @JMS\SerializedName("paths")
     * @var ArrayCollection|Path[]
     */
    protected $paths;

    /**
     * @JMS\Since("2.0")
     * @JMS\Type("ArrayCollection<string,Epfremme\Swagger\Entity\Schemas\AbstractSchema>")
     * @JMS\SerializedName("definitions")
     * @var ArrayCollection|SchemaInterface[]
     */
    protected $definitions;

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
     * @var ArrayCollection|Response[]
     */
    protected $responses;

    /**
     * @JMS\Since("2.0")
     * @JMS\Type("ArrayCollection<string,Epfremme\Swagger\Entity\SecurityDefinition>")
     * @JMS\SerializedName("securityDefinitions")
     * @var ArrayCollection|SecurityDefinition[]
     */
    protected $securityDefinitions;

    /**
     * @JMS\Since("2.0")
     * @JMS\Type("ArrayCollection<string,array>")
     * @JMS\SerializedName("security")
     * @var ArrayCollection|string[]
     */
    protected $security;

    /**
     * @JMS\Since("2.0")
     * @JMS\Type("ArrayCollection<string,Epfremme\Swagger\Entity\Tag>")
     * @JMS\SerializedName("tags")
     * @var ArrayCollection|Tag[]
     */
    protected $tags;

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
    public function getVersion()
    {
        if (!version_compare($this->version, SwaggerParser::MINIMUM_VERSION, '>=')) {
            throw new InvalidVersionException($this->version);
        }

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
