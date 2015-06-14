<?php
/**
 * File Contact.php
 *
 * @author Edward Pfremmer <epfremme@nerdery.com>
 */
namespace Epfremmer\SwaggerBundle\Entity;

use JMS\Serializer\Annotation as JMS;

/**
 * Class Contact
 *
 * @package Epfremmer\SwaggerBundle
 * @subpackage Entity
 */
class Contact
{

    /**
     * @JMS\Type("string")
     * @var string
     */
    protected $name;

    /**
     * @JMS\Type("string")
     * @var string
     */
    protected $url;

    /**
     * @JMS\Type("string")
     * @var string
     */
    protected $email;

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

    /**
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param string $email
     * @return Contact
     */
    public function setEmail($email)
    {
        $this->email = $email;
        return $this;
    }
}