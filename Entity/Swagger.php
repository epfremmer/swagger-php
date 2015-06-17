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
     * @param Info $version
     * @return self
     */
    public function setVersion(Info $version)
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
     * @param array $info
     * @return self
     */
    public function setInfo(array $info = [])
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
     * @return self
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
     * @return self
     */
    public function setBasePath($basePath)
    {
        $this->basePath = $basePath;
        return $this;
    }

    /**
     * @return string
     */
    public function getSchemes()
    {
        return $this->schemes;
    }

    /**
     * @param array $schemes
     * @return self
     */
    public function setSchemes(array $schemes = [])
    {
        $this->schemes = $schemes;
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
     * @return self
     */
    public function setPaths(ArrayCollection $paths)
    {
        $this->paths = $paths;
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
     * @return self
     */
    public function setSecurityDefinitions(ArrayCollection $securityDefinitions)
    {
        $this->securityDefinitions = $securityDefinitions;
        return $this;
    }

    /**
     * @return ArrayCollection|SchemaInterface[]
     */
    public function getDefinitions()
    {
        return $this->definitions;
    }

    /**
     * @param ArrayCollection|SchemaInterface[] $definitions
     * @return self
     */
    public function setDefinitions(ArrayCollection $definitions)
    {
        $this->definitions = $definitions;
        return $this;
    }

}