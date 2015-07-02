<?php
/**
 * File BooleanSchemaTest.php
 *
 * @author Edward Pfremmer <epfremme@nerdery.com>
 */
namespace Nerdery\Swagger\Tests\Entity\Schemas;

use Nerdery\Swagger\Entity\ExternalDocumentation;
use Nerdery\Swagger\Entity\Schemas\AbstractSchema;
use Nerdery\Swagger\Entity\Schemas\BooleanSchema;
use Nerdery\Swagger\Tests\Mixin\SerializerContextTrait;

/**
 * Class BooleanSchemaTest
 *
 * @package Nerdery\Swagger
 * @subpackage Tests\Entity\Schemas
 */
class BooleanSchemaTest extends \PHPUnit_Framework_TestCase
{
    use SerializerContextTrait;

    /**
     * @var BooleanSchema
     */
    protected $booleanSchema;

    /**
     * {@inheritdoc}
     */
    protected function setUp()
    {
        $this->booleanSchema = new BooleanSchema();
    }

    /**
     * @covers Nerdery\Swagger\Entity\Schemas\BooleanSchema::getType
     */
    public function testType()
    {
        $this->assertNotEmpty($this->booleanSchema->getType());
        $this->assertEquals(AbstractSchema::BOOLEAN_TYPE, $this->booleanSchema->getType());
    }

    /**
     * @covers Nerdery\Swagger\Entity\Schemas\BooleanSchema
     */
    public function testSerialization()
    {
        $data = json_encode([
            'type' => AbstractSchema::BOOLEAN_TYPE,
            'format'      => 'foo',
            'title'       => 'bar',
            'description' => 'baz',
            'example'     => 'qux',
            'externalDocs' => (object)[],
        ]);

        $schema = $this->getSerializer()->deserialize($data, AbstractSchema::class, 'json');

        $this->assertInstanceOf(BooleanSchema::class, $schema);
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
