<?php
/**
 * File NullSchemaTest.php
 *
 * @author Edward Pfremmer <epfremme@nerdery.com>
 */
namespace Nerdery\Swagger\Tests\Entity\Schemas;

use Nerdery\Swagger\Entity\ExternalDocumentation;
use Nerdery\Swagger\Entity\Schemas\AbstractSchema;
use Nerdery\Swagger\Entity\Schemas\NullSchema;
use Nerdery\Swagger\Tests\Mixin\SerializerContextTrait;

/**
 * Class NullSchemaTest
 *
 * @package Nerdery\Swagger
 * @subpackage Tests\Entity\Schemas
 */
class NullSchemaTest extends \PHPUnit_Framework_TestCase
{
    use SerializerContextTrait;

    /**
     * @var NullSchema
     */
    protected $nullSchema;

    /**
     * {@inheritdoc}
     */
    protected function setUp()
    {
        $this->nullSchema = new NullSchema();
    }

    /**
     * @covers Nerdery\Swagger\Entity\Schemas\NullSchema::getType
     */
    public function testType()
    {
        $this->assertNotEmpty($this->nullSchema->getType());
        $this->assertEquals(AbstractSchema::NULL_TYPE, $this->nullSchema->getType());
    }

    /**
     * @covers Nerdery\Swagger\Entity\Schemas\NullSchema
     */
    public function testSerialization()
    {
        $data = json_encode([
            'type' => AbstractSchema::NULL_TYPE,
            'format'      => 'foo',
            'title'       => 'bar',
            'description' => 'baz',
            'example'     => 'qux',
            'externalDocs' => (object)[],
        ]);

        $schema = $this->getSerializer()->deserialize($data, AbstractSchema::class, 'json');

        $this->assertInstanceOf(NullSchema::class, $schema);
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
