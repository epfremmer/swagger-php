<?php
/**
 * File ArraySchemaTest.php
 *
 * @author Edward Pfremmer <epfremme@nerdery.com>
 */
namespace ERP\Swagger\Tests\Entity\Schemas;

use ERP\Swagger\Entity\ExternalDocumentation;
use ERP\Swagger\Entity\Schemas\AbstractSchema;
use ERP\Swagger\Entity\Schemas\ArraySchema;
use ERP\Swagger\Tests\Mixin\SerializerContextTrait;

/**
 * Class ArraySchemaTest
 *
 * @package ERP\Swagger
 * @subpackage Tests\Entity\Schemas
 */
class ArraySchemaTest extends \PHPUnit_Framework_TestCase
{
    use SerializerContextTrait;

    /**
     * @var ArraySchema
     */
    protected $arraySchema;

    /**
     * {@inheritdoc}
     */
    protected function setUp()
    {
        $this->arraySchema = new ArraySchema();
    }

    /**
     * @covers ERP\Swagger\Entity\Schemas\ArraySchema::getType
     */
    public function testType()
    {
        $this->assertNotEmpty($this->arraySchema->getType());
        $this->assertEquals(AbstractSchema::ARRAY_TYPE, $this->arraySchema->getType());
    }

    /**
     * @covers ERP\Swagger\Entity\Schemas\ArraySchema
     */
    public function testSerialization()
    {
        $data = json_encode([
            'type' => AbstractSchema::ARRAY_TYPE,
            'format'      => 'foo',
            'title'       => 'bar',
            'description' => 'baz',
            'example'     => 'qux',
            'externalDocs' => (object)[],
        ]);

        $schema = $this->getSerializer()->deserialize($data, AbstractSchema::class, 'json');

        $this->assertInstanceOf(ArraySchema::class, $schema);
        $this->assertAttributeEquals('foo', 'format', $schema);
        $this->assertAttributeEquals('bar', 'title', $schema);
        $this->assertAttributeEquals('baz', 'description', $schema);
        $this->assertAttributeEquals('qux', 'example', $schema);
        $this->assertAttributeInstanceOf(ExternalDocumentation::class, 'externalDocs', $schema);

        $json = $this->getSerializer()->serialize($schema, 'json');

        $this->assertJson($json);
        $this->assertJsonStringEqualsJsonString($data, $json);
    }
}
