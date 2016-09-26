<?php
/**
 * File ObjectSchemaTest.php
 *
 * @author Edward Pfremmer <epfremme@nerdery.com>
 */
namespace Epfremme\Swagger\Tests\Entity\Schemas;

use Epfremme\Swagger\Entity\ExternalDocumentation;
use Epfremme\Swagger\Entity\Schemas\AbstractSchema;
use Epfremme\Swagger\Entity\Schemas\ObjectSchema;
use Epfremme\Swagger\Tests\Mixin\SerializerContextTrait;

/**
 * Class ObjectSchemaTest
 *
 * @package Epfremme\Swagger
 * @subpackage Tests\Entity\Schemas
 */
class ObjectSchemaTest extends \PHPUnit_Framework_TestCase
{
    use SerializerContextTrait;

    /**
     * @var ObjectSchema
     */
    protected $objectSchema;

    /**
     * {@inheritdoc}
     */
    protected function setUp()
    {
        $this->objectSchema = new ObjectSchema();
    }

    /**
     * @covers Epfremme\Swagger\Entity\Schemas\ObjectSchema::getType
     */
    public function testType()
    {
        $this->assertNotEmpty($this->objectSchema->getType());
        $this->assertEquals(AbstractSchema::OBJECT_TYPE, $this->objectSchema->getType());
    }

    /**
     * @covers Epfremme\Swagger\Entity\Schemas\ObjectSchema
     */
    public function testSerialization()
    {
        $data = json_encode([
            'type' => AbstractSchema::OBJECT_TYPE,
            'format'      => 'foo',
            'title'       => 'bar',
            'description' => 'baz',
            'example'     => 'qux',
            'externalDocs' => (object)[],
        ]);

        $schema = $this->getSerializer()->deserialize($data, AbstractSchema::class, 'json');

        $this->assertInstanceOf(ObjectSchema::class, $schema);
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
