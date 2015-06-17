<?php
/**
 * File License.php
 *
 * @author Edward Pfremmer <epfremme@nerdery.com>
 */
namespace Epfremmer\SwaggerBundle\Entity;

use JMS\Serializer\Annotation as JMS;

/**
 * Class License
 *
 * @package Epfremmer\SwaggerBundle
 * @subpackage Entity
 */
class License
{

    /**
     * @JMS\Type("string")
     * @JMS\SerializedName("name")
     * @var string
     */
    protected $name;

    /**
     * @JMS\Type("string")
     * @JMS\SerializedName("url")
     * @var string
     */
    protected $url;

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return Contact
     */
    public function setName($name)
    {
        $this->name = $name;
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
     * @return Contact
     */
    public function setUrl($url)
    {
        $this->url = $url;
        return $this;
    }
}