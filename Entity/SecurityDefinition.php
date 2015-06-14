<?php
/**
 * File SecurityDefinition.php
 *
 * @author Edward Pfremmer <epfremme@nerdery.com>
 */
namespace Epfremmer\SwaggerBundle\Entity;

use JMS\Serializer\Annotation as JMS;

/**
 * Class SecurityDefinition
 *
 * @package Epfremmer\SwaggerBundle
 * @subpackage Entity
 */
class SecurityDefinition
{

    /**
     * @JMS\Type("string")
     * @var string
     */
    protected $type;

    /**
     * @JMS\Type("string")
     * @var string
     */
    protected $description;

    /**
     * @JMS\Type("string")
     * @var string
     */
    protected $name;

    /**
     * @JMS\Type("string")
     * @var string
     */
    protected $in;

    /**
     * @JMS\Type("string")
     * @var string
     */
    protected $flow;

    /**
     * @JMS\Type("string")
     * @JMS\SerializedName("authorizationUrl")
     * @var string
     */
    protected $authorizationUrl;

    /**
     * @JMS\Type("string")
     * @JMS\SerializedName("tokenUrl")
     * @var string
     */
    protected $tokenUrl;

    /**
     * @JMS\Type("array")
     * @var array
     */
    protected $scopes = [];

    /**
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param string $type
     * @return SecurityDefinition
     */
    public function setType($type)
    {
        $this->type = $type;
        return $this;
    }

    /**
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param string $description
     * @return SecurityDefinition
     */
    public function setDescription($description)
    {
        $this->description = $description;
        return $this;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return SecurityDefinition
     */
    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return string
     */
    public function getIn()
    {
        return $this->in;
    }

    /**
     * @param string $in
     * @return SecurityDefinition
     */
    public function setIn($in)
    {
        $this->in = $in;
        return $this;
    }

    /**
     * @return string
     */
    public function getFlow()
    {
        return $this->flow;
    }

    /**
     * @param string $flow
     * @return SecurityDefinition
     */
    public function setFlow($flow)
    {
        $this->flow = $flow;
        return $this;
    }

    /**
     * @return string
     */
    public function getAuthorizationUrl()
    {
        return $this->authorizationUrl;
    }

    /**
     * @param string $authorizationUrl
     * @return SecurityDefinition
     */
    public function setAuthorizationUrl($authorizationUrl)
    {
        $this->authorizationUrl = $authorizationUrl;
        return $this;
    }

    /**
     * @return string
     */
    public function getTokenUrl()
    {
        return $this->tokenUrl;
    }

    /**
     * @param string $tokenUrl
     * @return SecurityDefinition
     */
    public function setTokenUrl($tokenUrl)
    {
        $this->tokenUrl = $tokenUrl;
        return $this;
    }

    /**
     * @return array
     */
    public function getScopes()
    {
        return $this->scopes;
    }

    /**
     * @param array $scopes
     * @return SecurityDefinition
     */
    public function setScopes(array $scopes)
    {
        $this->scopes = $scopes;
        return $this;
    }

}