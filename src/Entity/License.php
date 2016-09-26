<?php
/**
 * File License.php
 *
 * @author Edward Pfremmer <epfremme@nerdery.com>
 */
namespace Epfremme\Swagger\Entity;

use JMS\Serializer\Annotation as JMS;

/**
 * Class License
 *
 * @package Epfremme\Swagger
 * @subpackage Entity
 */
class License
{
    /**
     * @JMS\Since("2.0")
     * @JMS\Type("string")
     * @JMS\SerializedName("name")
     * @var string
     */
    protected $name;

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
