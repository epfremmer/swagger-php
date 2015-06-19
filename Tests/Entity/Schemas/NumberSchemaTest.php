<?php
/**
 * File NumberSchemaTest.php
 *
 * @author Edward Pfremmer <epfremme@nerdery.com>
 */
namespace ERP\Swagger\Tests\Entity\Schemas;

use ERP\Swagger\Entity\ExternalDocumentation;
use ERP\Swagger\Entity\Schemas\AbstractSchema;
use ERP\Swagger\Entity\Schemas\NumberSchema;
use ERP\Swagger\Tests\Mixin\SerializerContextTrait;

/**
 * Class NumberSchemaTest
 *
 * @package ERP\Swagger
 * @subpackage Tests\Entity\Schemas
 */
class NumberSchemaTest extends \PHPUnit_Framework_TestCase
{
    use SerializerContextTrait;

    /**
     * @var NumberSchema
     */
    protected $numberSchema;

    /**
     * {@inheritdoc}
     */
    protected function setUp()
    {
        $this->numberSchema = new NumberSchema();
    }

    /**
     * @covers ERP\Swagger\Entity\Schemas\NumberSchema::getType
     */
    public function testType()
    {
        $this->assertNotEmpty($this->numberSchema->getType());
        $this->assertEquals(AbstractSchema::NUMBER_TYPE, $this->numberSchema->getType());
    }

    /**
     * @covers ERP\Swagger\Entity\Schemas\NumberSchema
     */
    public function testSerialization()
    {
        $data = json_encode([
            'type' => AbstractSchema::NUMBER_TYPE,
            'format'      => 'foo',
            'title'       => 'bar',
            'description' => 'baz',
            'example'     => 'qux',
            'externalDocs' => (object)[],
        ]);

        $schema = $this->getSerializer()->deserialize($data, AbstractSchema::class, 'json');

        $this->assertInstanceOf(NumberSchema::class, $schema);
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
