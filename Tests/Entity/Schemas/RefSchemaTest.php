<?php
/**
 * File RefSchemaTest.php
 *
 * @author Edward Pfremmer <epfremme@nerdery.com>
 */
namespace ERP\Swagger\Tests\Entity\Schemas;

use ERP\Swagger\Entity\ExternalDocumentation;
use ERP\Swagger\Entity\Schemas\AbstractSchema;
use ERP\Swagger\Entity\Schemas\RefSchema;
use ERP\Swagger\Tests\Mixin\SerializerContextTrait;

/**
 * Class RefSchemaTest
 *
 * @package ERP\Swagger
 * @subpackage Tests\Entity\Schemas
 */
class RefSchemaTest extends \PHPUnit_Framework_TestCase
{
    use SerializerContextTrait;

    /**
     * @var RefSchema
     */
    protected $refSchema;

    /**
     * {@inheritdoc}
     */
    protected function setUp()
    {
        $this->refSchema = new RefSchema();
    }

    /**
     * @covers ERP\Swagger\Entity\Schemas\RefSchema::getType
     */
    public function testType()
    {
        $this->assertNotEmpty($this->refSchema->getType());
        $this->assertEquals(RefSchema::REF_TYPE, $this->refSchema->getType());
    }

    /**
     * @covers ERP\Swagger\Entity\Schemas\RefSchema::getRef
     * @covers ERP\Swagger\Entity\Schemas\RefSchema::setRef
     */
    public function testRef()
    {
        $this->assertClassHasAttribute('ref', RefSchema::class);
        $this->assertInstanceOf(RefSchema::class, $this->refSchema->setRef('#/definitions/foo'));
        $this->assertAttributeEquals('#/definitions/foo', 'ref', $this->refSchema);
        $this->assertEquals('#/definitions/foo', $this->refSchema->getRef());
    }

    /**
     * @covers ERP\Swagger\Entity\Schemas\RefSchema::getTitle
     * @covers ERP\Swagger\Entity\Schemas\RefSchema::setTitle
     */
    public function testTitle()
    {
        $this->assertClassHasAttribute('title', AbstractSchema::class);
        $this->assertInstanceOf(RefSchema::class, $this->refSchema->setTitle('foo'));
        $this->assertAttributeEquals('foo', 'title', $this->refSchema);
        $this->assertEquals('foo', $this->refSchema->getTitle());
    }

    /**
     * @covers ERP\Swagger\Entity\Schemas\RefSchema::getDescription
     * @covers ERP\Swagger\Entity\Schemas\RefSchema::setDescription
     */
    public function testDescription()
    {
        $this->assertClassHasAttribute('description', AbstractSchema::class);
        $this->assertInstanceOf(RefSchema::class, $this->refSchema->setDescription('foo'));
        $this->assertAttributeEquals('foo', 'description', $this->refSchema);
        $this->assertEquals('foo', $this->refSchema->getDescription());
    }

    /**
     * @covers ERP\Swagger\Entity\Schemas\RefSchema
     */
    public function testSerialization()
    {
        $data = json_encode([
            '$ref'        => '#/definitions/foo',
            'title'       => 'foo',
            'description' => 'bar',
        ]);

        $schema = $this->getSerializer()->deserialize($data, AbstractSchema::class, 'json');

        $this->assertInstanceOf(RefSchema::class, $schema);
        $this->assertAttributeEquals('#/definitions/foo', 'ref', $schema);
        $this->assertAttributeEquals('foo', 'title', $schema);
        $this->assertAttributeEquals('bar', 'description', $schema);

        $json = $this->getSerializer()->serialize($schema, 'json');

        $this->assertJson($json);
        $this->assertJsonStringEqualsJsonString($data, $json);
    }
}
