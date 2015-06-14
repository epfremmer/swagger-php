<?php
/**
 * File AbstractParameter.php
 *
 * @author Edward Pfremmer <epfremme@nerdery.com>
 */
namespace Epfremmer\SwaggerBundle\Entity\Parameters;

use Epfremmer\SwaggerBundle\Entity\Schemas\AbstractSchema;
use JMS\Serializer\Annotation as JMS;

/**
 * Class AbstractParameter
 *
 * @JMS\Discriminator(field = "in", map = {
 *   "path"    : "Epfremmer\SwaggerBundle\Entity\Parameters\PathParameter",
 *   "query"   : "Epfremmer\SwaggerBundle\Entity\Parameters\QueryParameter",
 *   "header"  : "Epfremmer\SwaggerBundle\Entity\Parameters\HeaderParameter",
 *   "body"    : "Epfremmer\SwaggerBundle\Entity\Parameters\BodyParameter",
 *   "formData": "Epfremmer\SwaggerBundle\Entity\Parameters\FormParameter"
 * })
 *
 * @package Epfremmer\SwaggerBundle
 * @subpackage Entity\Parameters
 */
abstract class AbstractParameter
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
    protected $description;

    /**
     * @JMS\Type("boolean")
     * @var boolean
     */
    protected $required;

    /**
     * @JMS\Type("Epfremmer\SwaggerBundle\Entity\Schemas\AbstractSchema")
     * @var AbstractSchema
     */
    protected $schema;

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return AbstractParameter
     */
    public function setName($name)
    {
        $this->name = $name;
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
     * @return AbstractParameter
     */
    public function setDescription($description)
    {
        $this->description = $description;
        return $this;
    }

    /**
     * @return boolean
     */
    public function isRequired()
    {
        return $this->required;
    }

    /**
     * @param boolean $required
     * @return AbstractParameter
     */
    public function setRequired($required)
    {
        $this->required = $required;
        return $this;
    }

    /**
     * @return AbstractSchema
     */
    public function getSchema()
    {
        return $this->schema;
    }

    /**
     * @param AbstractSchema $schema
     * @return AbstractParameter
     */
    public function setSchema(AbstractSchema $schema)
    {
        $this->schema = $schema;
        return $this;
    }
}