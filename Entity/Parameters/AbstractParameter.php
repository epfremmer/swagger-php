<?php
/**
 * File AbstractParameter.php
 *
 * @author Edward Pfremmer <epfremme@nerdery.com>
 */
namespace ERP\Swagger\Entity\Parameters;

use ERP\Swagger\Annotations as EP;
use JMS\Serializer\Annotation as JMS;

/**
 * Class AbstractParameter
 *
 * @EP\Discriminator(field = "class", default="body", map = {
 *   "body"            : "ERP\Swagger\Entity\Parameters\BodyParameter",
 *   "path.string"     : "ERP\Swagger\Entity\Parameters\PathParameter\StringType",
 *   "path.integer"    : "ERP\Swagger\Entity\Parameters\PathParameter\IntegerType",
 *   "path.boolean"    : "ERP\Swagger\Entity\Parameters\PathParameter\BooleanType",
 *   "query.string"    : "ERP\Swagger\Entity\Parameters\QueryParameter\StringType",
 *   "query.number"    : "ERP\Swagger\Entity\Parameters\QueryParameter\NumberType",
 *   "query.integer"   : "ERP\Swagger\Entity\Parameters\QueryParameter\IntegerType",
 *   "query.boolean"   : "ERP\Swagger\Entity\Parameters\QueryParameter\BooleanType",
 *   "query.array"     : "ERP\Swagger\Entity\Parameters\QueryParameter\ArrayType",
 *   "header.string"   : "ERP\Swagger\Entity\Parameters\HeaderParameter\StringType",
 *   "header.number"   : "ERP\Swagger\Entity\Parameters\HeaderParameter\NumberType",
 *   "header.integer"  : "ERP\Swagger\Entity\Parameters\HeaderParameter\IntegerType",
 *   "header.boolean"  : "ERP\Swagger\Entity\Parameters\HeaderParameter\BooleanType",
 *   "header.array"    : "ERP\Swagger\Entity\Parameters\HeaderParameter\ArrayType",
 *   "formData.string" : "ERP\Swagger\Entity\Parameters\FormParameter\StringType",
 *   "formData.number" : "ERP\Swagger\Entity\Parameters\FormParameter\NumberType",
 *   "formData.integer": "ERP\Swagger\Entity\Parameters\FormParameter\IntegerType",
 *   "formData.boolean": "ERP\Swagger\Entity\Parameters\FormParameter\BooleanType",
 *   "formData.array"  : "ERP\Swagger\Entity\Parameters\FormParameter\ArrayType",
 *   "formData.file"   : "ERP\Swagger\Entity\Parameters\FormParameter\FileType"
 * })
 *
 * @package ERP\Swagger
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