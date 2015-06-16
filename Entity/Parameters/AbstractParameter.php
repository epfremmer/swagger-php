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
 *   "body"    : "Epfremmer\SwaggerBundle\Entity\Parameters\BodyParameter",
 *
 *   "path.string" : "Epfremmer\SwaggerBundle\Entity\Parameters\PathParameter\StringType",
 *   "path.integer": "Epfremmer\SwaggerBundle\Entity\Parameters\PathParameter\IntegerType",
 *   "path.boolean": "Epfremmer\SwaggerBundle\Entity\Parameters\PathParameter\BooleanType",
 *
 *   "query.string" : "Epfremmer\SwaggerBundle\Entity\Parameters\QueryParameter\StringType",
 *   "query.number" : "Epfremmer\SwaggerBundle\Entity\Parameters\QueryParameter\NumberType",
 *   "query.integer": "Epfremmer\SwaggerBundle\Entity\Parameters\QueryParameter\IntegerType",
 *   "query.boolean": "Epfremmer\SwaggerBundle\Entity\Parameters\QueryParameter\BooleanType",
 *   "query.array"  : "Epfremmer\SwaggerBundle\Entity\Parameters\QueryParameter\ArrayType",
 *
 *   "header.string" : "Epfremmer\SwaggerBundle\Entity\Parameters\HeaderParameter\StringType",
 *   "header.number" : "Epfremmer\SwaggerBundle\Entity\Parameters\HeaderParameter\NumberType",
 *   "header.integer": "Epfremmer\SwaggerBundle\Entity\Parameters\HeaderParameter\IntegerType",
 *   "header.boolean": "Epfremmer\SwaggerBundle\Entity\Parameters\HeaderParameter\BooleanType",
 *   "header.array"  : "Epfremmer\SwaggerBundle\Entity\Parameters\HeaderParameter\ArrayType",
 *
 *   "formData.string" : "Epfremmer\SwaggerBundle\Entity\Parameters\FormParameter\StringType",
 *   "formData.number" : "Epfremmer\SwaggerBundle\Entity\Parameters\FormParameter\NumberType",
 *   "formData.integer": "Epfremmer\SwaggerBundle\Entity\Parameters\FormParameter\IntegerType",
 *   "formData.boolean": "Epfremmer\SwaggerBundle\Entity\Parameters\FormParameter\BooleanType",
 *   "formData.array"  : "Epfremmer\SwaggerBundle\Entity\Parameters\FormParameter\ArrayType",
 *   "formData.file"   : "Epfremmer\SwaggerBundle\Entity\Parameters\FormParameter\FileType"
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
}