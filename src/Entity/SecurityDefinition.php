<?php
/**
 * File SecurityDefinition.php
 *
 * @author Edward Pfremmer <epfremme@nerdery.com>
 */
namespace Epfremme\Swagger\Entity;

use JMS\Serializer\Annotation as JMS;

/**
 * Class SecurityDefinition
 *
 * @package Epfremme\Swagger
 * @subpackage Entity
 */
class SecurityDefinition
{
    /**
     * @JMS\Since("2.0")
     * @JMS\Type("string")
     * @JMS\SerializedName("type")
     * @var string
     */
    protected $type;

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
     * @JMS\SerializedName("name")
     * @var string
     */
    protected $name;

    /**
     * @JMS\Since("2.0")
     * @JMS\Type("string")
     * @JMS\SerializedName("in")
     * @var string
     */
    protected $in;

    /**
     * @JMS\Since("2.0")
     * @JMS\Type("string")
     * @JMS\SerializedName("flow")
     * @var string
     */
    protected $flow;

    /**
     * @JMS\Since("2.0")
     * @JMS\Type("string")
     * @JMS\SerializedName("authorizationUrl")
     * @var string
     */
    protected $authorizationUrl;

    /**
     * @JMS\Since("2.0")
     * @JMS\Type("string")
     * @JMS\SerializedName("tokenUrl")
     * @var string
     */
    protected $tokenUrl;

    /**
     * @JMS\Since("2.0")
     * @JMS\Type("array")
     * @JMS\SerializedName("scopes")
     * @var array
     */
    protected $scopes;

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
    public function setScopes($scopes)
    {
        $this->scopes = $scopes;
        return $this;
    }

}
