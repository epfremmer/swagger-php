<?php
/**
 * File AbstractParameter.php
 *
 * @author Edward Pfremmer <epfremme@nerdery.com>
 */
namespace Epfremmer\SwaggerBundle\Entity\Parameters;

use Epfremmer\SwaggerBundle\Annotations as EP;
use JMS\Serializer\Annotation as JMS;

/**
 * Class AbstractParameter
 *
 * @EP\Discriminator(field = "class", default="body", map = {
 *   "body"            : "Epfremmer\SwaggerBundle\Entity\Parameters\BodyParameter",
 *   "path.string"     : "Epfremmer\SwaggerBundle\Entity\Parameters\PathParameter\StringType",
 *   "path.integer"    : "Epfremmer\SwaggerBundle\Entity\Parameters\PathParameter\IntegerType",
 *   "path.boolean"    : "Epfremmer\SwaggerBundle\Entity\Parameters\PathParameter\BooleanType",
 *   "query.string"    : "Epfremmer\SwaggerBundle\Entity\Parameters\QueryParameter\StringType",
 *   "query.number"    : "Epfremmer\SwaggerBundle\Entity\Parameters\QueryParameter\NumberType",
 *   "query.integer"   : "Epfremmer\SwaggerBundle\Entity\Parameters\QueryParameter\IntegerType",
 *   "query.boolean"   : "Epfremmer\SwaggerBundle\Entity\Parameters\QueryParameter\BooleanType",
 *   "query.array"     : "Epfremmer\SwaggerBundle\Entity\Parameters\QueryParameter\ArrayType",
 *   "header.string"   : "Epfremmer\SwaggerBundle\Entity\Parameters\HeaderParameter\StringType",
 *   "header.number"   : "Epfremmer\SwaggerBundle\Entity\Parameters\HeaderParameter\NumberType",
 *   "header.integer"  : "Epfremmer\SwaggerBundle\Entity\Parameters\HeaderParameter\IntegerType",
 *   "header.boolean"  : "Epfremmer\SwaggerBundle\Entity\Parameters\HeaderParameter\BooleanType",
 *   "header.array"    : "Epfremmer\SwaggerBundle\Entity\Parameters\HeaderParameter\ArrayType",
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

    // parameter in constants
    const IN_BODY      = 'body';
    const IN_PATH      = 'path';
    const IN_QUERY     = 'query';
    const IN_HEADER    = 'header';
    const IN_FORM_DATA = 'formData';

    /**
     * @JMS\Type("string")
     * @JMS\SerializedName("in")
     * @var string
     */
    protected $in;

    /**
     * @JMS\Type("string")
     * @JMS\SerializedName("name")
     * @var string
     */
    protected $name;

    /**
     * @JMS\Type("string")
     * @JMS\SerializedName("description")
     * @var string
     */
    protected $description;

    /**
     * @JMS\Type("boolean")
     * @JMS\SerializedName("required")
     * @var boolean
     */
    protected $required;

    /**
     * @return string
     */
    public function getIn()
    {
        return $this->in;
    }

    /**
     * @param string $in
     * @return AbstractParameter
     */
    public function setIn($in)
    {
        $this->in = $in;
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