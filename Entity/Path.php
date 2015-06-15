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
     * @JMS\Type("ArrayCollection<string,Epfremmer\SwaggerBundle\Entity\Operation>")
     *
     * @var Operation[]|ArrayCollection
     */
    protected $operations;

    /**
     * @return Operation[]|ArrayCollection
     */
    public function getRoutes()
    {
        return $this->operations;
    }

    /**
     * @param ArrayCollection $operations
     * @return Path
     */
    public function setRoutes(ArrayCollection $operations)
    {
        $this->operations = $operations;
        return $this;
    }

}