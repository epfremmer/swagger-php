<?php
/**
 * File StringSchemaTest.php
 *
 * @author Edward Pfremmer <epfremme@nerdery.com>
 */
namespace Nerdery\Swagger\Tests\Entity\Schemas;

use Nerdery\Swagger\Entity\ExternalDocumentation;
use Nerdery\Swagger\Entity\Schemas\AbstractSchema;
use Nerdery\Swagger\Entity\Schemas\StringSchema;
use Nerdery\Swagger\Tests\Mixin\SerializerContextTrait;

/**
 * Class StringSchemaTest
 *
 * @package Nerdery\Swagger
 * @subpackage Tests\Entity\Schemas
 */
class StringSchemaTest extends \PHPUnit_Framework_TestCase
{
    use SerializerContextTrait;

    /**
     * @var StringSchema
     */
    protected $stringSchema;

    /**
     * {@inheritdoc}
     */
    protected function setUp()
    {
        $this->stringSchema = new StringSchema();
    }

    /**
     * @covers Nerdery\Swagger\Entity\Schemas\StringSchema::getType
     */
    public function testType()
    {
        $this->assertNotEmpty($this->stringSchema->getType());
        $this->assertEquals(AbstractSchema::STRING_TYPE, $this->stringSchema->getType());
    }

    /**
     * @covers Nerdery\Swagger\Entity\Schemas\StringSchema
     */
    public function testSerialization()
    {
        $data = json_encode([
            'type' => AbstractSchema::STRING_TYPE,
            'format'      => 'foo',
            'title'       => 'bar',
            'description' => 'baz',
            'example'     => 'qux',
            'externalDocs' => (object)[],
        ]);

        $schema = $this->getSerializer()->deserialize($data, AbstractSchema::class, 'json');

        $this->assertInstanceOf(StringSchema::class, $schema);
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
