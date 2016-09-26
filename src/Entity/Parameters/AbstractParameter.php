<?php
/**
 * File AbstractParameter.php
 *
 * @author Edward Pfremmer <epfremme@nerdery.com>
 */
namespace Epfremme\Swagger\Entity\Parameters;

use Epfremme\Swagger\Annotations as EP;
use JMS\Serializer\Annotation as JMS;

/**
 * Class AbstractParameter
 *
 * @EP\Discriminator(field = "class", default="body", map = {
 *   "body"            : "Epfremme\Swagger\Entity\Parameters\BodyParameter",
 *   "path.string"     : "Epfremme\Swagger\Entity\Parameters\PathParameter\StringType",
 *   "path.integer"    : "Epfremme\Swagger\Entity\Parameters\PathParameter\IntegerType",
 *   "path.boolean"    : "Epfremme\Swagger\Entity\Parameters\PathParameter\BooleanType",
 *   "query.string"    : "Epfremme\Swagger\Entity\Parameters\QueryParameter\StringType",
 *   "query.number"    : "Epfremme\Swagger\Entity\Parameters\QueryParameter\NumberType",
 *   "query.integer"   : "Epfremme\Swagger\Entity\Parameters\QueryParameter\IntegerType",
 *   "query.boolean"   : "Epfremme\Swagger\Entity\Parameters\QueryParameter\BooleanType",
 *   "query.array"     : "Epfremme\Swagger\Entity\Parameters\QueryParameter\ArrayType",
 *   "header.string"   : "Epfremme\Swagger\Entity\Parameters\HeaderParameter\StringType",
 *   "header.number"   : "Epfremme\Swagger\Entity\Parameters\HeaderParameter\NumberType",
 *   "header.integer"  : "Epfremme\Swagger\Entity\Parameters\HeaderParameter\IntegerType",
 *   "header.boolean"  : "Epfremme\Swagger\Entity\Parameters\HeaderParameter\BooleanType",
 *   "header.array"    : "Epfremme\Swagger\Entity\Parameters\HeaderParameter\ArrayType",
 *   "formData.string" : "Epfremme\Swagger\Entity\Parameters\FormParameter\StringType",
 *   "formData.number" : "Epfremme\Swagger\Entity\Parameters\FormParameter\NumberType",
 *   "formData.integer": "Epfremme\Swagger\Entity\Parameters\FormParameter\IntegerType",
 *   "formData.boolean": "Epfremme\Swagger\Entity\Parameters\FormParameter\BooleanType",
 *   "formData.array"  : "Epfremme\Swagger\Entity\Parameters\FormParameter\ArrayType",
 *   "formData.file"   : "Epfremme\Swagger\Entity\Parameters\FormParameter\FileType"
 * })
 *
 * @package Epfremme\Swagger
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
