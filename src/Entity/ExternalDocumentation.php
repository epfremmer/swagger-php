<?php
/**
 * File Tag.php
 *
 * @author Edward Pfremmer <epfremme@nerdery.com>
 */
namespace Epfremme\Swagger\Entity;

use JMS\Serializer\Annotation as JMS;

/**
 * Class Tag
 *
 * @package Epfremme\Swagger
 * @subpackage Entity
 */
class ExternalDocumentation
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
