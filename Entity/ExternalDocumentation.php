<?php
/**
 * File Tag.php
 *
 * @author Edward Pfremmer <epfremme@nerdery.com>
 */
namespace Epfremmer\SwaggerBundle\Entity;

use JMS\Serializer\Annotation as JMS;

/**
 * Class Tag
 *
 * @package Epfremmer\SwaggerBundle
 * @subpackage Entity
 */
class ExternalDocumentation
{

    /**
     * @JMS\Type("string")
     * @JMS\SerializedName("description")
     * @var string
     */
    protected $description;

    /**
     * @JMS\Type("string")
     * @JMS\SerializedName("url")
     * @var string
     */
    protected $url;

    /**
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param string $description
     * @return ExternalDocumentation
     */
    public function setDescription($description)
    {
        $this->description = $description;
        return $this;
    }

    /**
     * @return string
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * @param string $url
     * @return ExternalDocumentation
     */
    public function setUrl($url)
    {
        $this->url = $url;
        return $this;
    }
}