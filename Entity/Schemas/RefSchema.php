<?php
/**
 * File RefSchema.php
 *
 * @author Edward Pfremmer <epfremme@nerdery.com>
 */
namespace ERP\Swagger\Entity\Schemas;

use ERP\Swagger\Entity\Mixin\Primitives;
use JMS\Serializer\Annotation as JMS;

/**
 * Class RefSchema
 *
 * @package ERP\Swagger
 * @subpackage Entity\Schemas
 */
class RefSchema implements SchemaInterface
{
    // schema type
    const REF_TYPE = 'ref';

    /**
     * @JMS\Type("string")
     * @JMS\SerializedName("$ref")
     * @var string
     */
    protected $ref;

    /**
     * @JMS\Type("string")
     * @JMS\SerializedName("title")
     * @var string
     */
    protected $title;

    /**
     * @JMS\Type("string")
     * @JMS\SerializedName("description")
     * @var string
     */
    protected $description;

    /**
     * {@inheritdoc}
     */
    public function getType()
    {
        return self::REF_TYPE;
    }

    /**
     * @return string
     */
    public function getRef()
    {
        return $this->ref;
    }

    /**
     * @param string $ref
     * @return RefSchema
     */
    public function setRef($ref)
    {
        $this->ref = $ref;
        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * {@inheritdoc}
     */
    public function setTitle($title)
    {
        $this->title = $title;
        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * {@inheritdoc}
     */
    public function setDescription($description)
    {
        $this->description = $description;
        return $this;
    }
}