<?php
/**
 * File IntegerSchemaTest.php
 *
 * @author Edward Pfremmer <epfremme@nerdery.com>
 */
namespace ERP\Swagger\Tests\Entity\Schemas;

use ERP\Swagger\Entity\ExternalDocumentation;
use ERP\Swagger\Entity\Schemas\AbstractSchema;
use ERP\Swagger\Entity\Schemas\IntegerSchema;
use ERP\Swagger\Tests\Mixin\SerializerContextTrait;

/**
 * Class IntegerSchemaTest
 *
 * @package ERP\Swagger
 * @subpackage Tests\Entity\Schemas
 */
class IntegerSchemaTest extends \PHPUnit_Framework_TestCase
{
    use SerializerContextTrait;

    /**
     * @var IntegerSchema
     */
    protected $integerSchema;

    /**
     * {@inheritdoc}
     */
    protected function setUp()
    {
        $this->integerSchema = new IntegerSchema();
    }

    /**
     * @covers ERP\Swagger\Entity\Schemas\IntegerSchema::getType
     */
    public function testType()
    {
        $this->assertNotEmpty($this->integerSchema->getType());
        $this->assertEquals(AbstractSchema::INTEGER_TYPE, $this->integerSchema->getType());
    }

    /**
     * @covers ERP\Swagger\Entity\Schemas\IntegerSchema
     */
    public function testSerialization()
    {
        $data = json_encode([
            'type' => AbstractSchema::INTEGER_TYPE,
            'format'      => 'foo',
            'title'       => 'bar',
            'description' => 'baz',
            'example'     => 'qux',
            'externalDocs' => (object)[],
        ]);

        $schema = $this->getSerializer()->deserialize($data, AbstractSchema::class, 'json');

        $this->assertInstanceOf(IntegerSchema::class, $schema);
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
