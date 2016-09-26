<?php
/**
 * File NumberSchemaTest.php
 *
 * @author Edward Pfremmer <epfremme@nerdery.com>
 */
namespace Epfremme\Swagger\Tests\Entity\Schemas;

use Epfremme\Swagger\Entity\ExternalDocumentation;
use Epfremme\Swagger\Entity\Schemas\AbstractSchema;
use Epfremme\Swagger\Entity\Schemas\NumberSchema;
use Epfremme\Swagger\Tests\Mixin\SerializerContextTrait;

/**
 * Class NumberSchemaTest
 *
 * @package Epfremme\Swagger
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
     * @covers Epfremme\Swagger\Entity\Schemas\NumberSchema::getType
     */
    public function testType()
    {
        $this->assertNotEmpty($this->numberSchema->getType());
        $this->assertEquals(AbstractSchema::NUMBER_TYPE, $this->numberSchema->getType());
    }

    /**
     * @covers Epfremme\Swagger\Entity\Schemas\NumberSchema
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
