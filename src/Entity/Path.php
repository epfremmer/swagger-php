<?php
/**
 * File Path.php
 *
 * @author Edward Pfremmer <epfremme@nerdery.com>
 */
namespace Nerdery\Swagger\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use JMS\Serializer\Annotation as JMS;
use JMS\Serializer\DeserializationContext;
use JMS\Serializer\VisitorInterface;

/**
 * Class Path
 *
 * @package Nerdery\Swagger
 * @subpackage Entity
 */
class Path
{

    /**
     * @JMS\Inline()
     * @JMS\Since("2.0")
     * @JMS\SerializedName("data")
     * @JMS\Type("ArrayCollection<string,Nerdery\Swagger\Entity\Operation>")
     *
     * @var Operation[]|ArrayCollection
     */
    protected $operations;

    /**
     * @return Operation[]|ArrayCollection
     */
    public function getOperations()
    {
        return $this->operations;
    }

    /**
     * @param ArrayCollection $operations
     * @return Path
     */
    public function setOperations(ArrayCollection $operations)
    {
        $this->operations = $operations;
        return $this;
    }

}