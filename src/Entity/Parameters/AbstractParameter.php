<?php
/**
 * File AbstractParameter.php
 *
 * @author Edward Pfremmer <epfremme@nerdery.com>
 */
namespace Nerdery\Swagger\Entity\Parameters;

use Nerdery\Swagger\Annotations as EP;
use JMS\Serializer\Annotation as JMS;

/**
 * Class AbstractParameter
 *
 * @EP\Discriminator(field = "class", default="body", map = {
 *   "body"            : "Nerdery\Swagger\Entity\Parameters\BodyParameter",
 *   "path.string"     : "Nerdery\Swagger\Entity\Parameters\PathParameter\StringType",
 *   "path.integer"    : "Nerdery\Swagger\Entity\Parameters\PathParameter\IntegerType",
 *   "path.boolean"    : "Nerdery\Swagger\Entity\Parameters\PathParameter\BooleanType",
 *   "query.string"    : "Nerdery\Swagger\Entity\Parameters\QueryParameter\StringType",
 *   "query.number"    : "Nerdery\Swagger\Entity\Parameters\QueryParameter\NumberType",
 *   "query.integer"   : "Nerdery\Swagger\Entity\Parameters\QueryParameter\IntegerType",
 *   "query.boolean"   : "Nerdery\Swagger\Entity\Parameters\QueryParameter\BooleanType",
 *   "query.array"     : "Nerdery\Swagger\Entity\Parameters\QueryParameter\ArrayType",
 *   "header.string"   : "Nerdery\Swagger\Entity\Parameters\HeaderParameter\StringType",
 *   "header.number"   : "Nerdery\Swagger\Entity\Parameters\HeaderParameter\NumberType",
 *   "header.integer"  : "Nerdery\Swagger\Entity\Parameters\HeaderParameter\IntegerType",
 *   "header.boolean"  : "Nerdery\Swagger\Entity\Parameters\HeaderParameter\BooleanType",
 *   "header.array"    : "Nerdery\Swagger\Entity\Parameters\HeaderParameter\ArrayType",
 *   "formData.string" : "Nerdery\Swagger\Entity\Parameters\FormParameter\StringType",
 *   "formData.number" : "Nerdery\Swagger\Entity\Parameters\FormParameter\NumberType",
 *   "formData.integer": "Nerdery\Swagger\Entity\Parameters\FormParameter\IntegerType",
 *   "formData.boolean": "Nerdery\Swagger\Entity\Parameters\FormParameter\BooleanType",
 *   "formData.array"  : "Nerdery\Swagger\Entity\Parameters\FormParameter\ArrayType",
 *   "formData.file"   : "Nerdery\Swagger\Entity\Parameters\FormParameter\FileType"
 * })
 *
 * @package Nerdery\Swagger
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
     * @JMS\Since("2.0")
     * @JMS\Type("string")
     * @JMS\SerializedName("in")
     * @var string
     */
    protected $in;

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
     * @JMS\SerializedName("description")
     * @var string
     */
    protected $description;

    /**
     * @JMS\Since("2.0")
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