<?php
/**
 * File Path.php
 *
 * @author Edward Pfremmer <epfremme@nerdery.com>
 */
namespace Epfremmer\SwaggerBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use JMS\Serializer\Annotation as JMS;
use JMS\Serializer\DeserializationContext;
use JMS\Serializer\VisitorInterface;

/**
 * Class Path
 *
 * @package Epfremmer\SwaggerBundle
 * @subpackage Entity
 */
class Path
{

    /**
     * @JMS\Inline()
     * @JMS\SerializedName("data")
     * @JMS\Type("ArrayCollection<string,Epfremmer\SwaggerBundle\Entity\Route>")
     *
     * @var Route[]|ArrayCollection
     */
    protected $routes;

    /**
     * @return Route[]|ArrayCollection
     */
    public function getRoutes()
    {
        return $this->routes;
    }

    /**
     * @param ArrayCollection $routes
     * @return Path
     */
    public function setRoutes(ArrayCollection $routes)
    {
        $this->routes = $routes;
        return $this;
    }

}