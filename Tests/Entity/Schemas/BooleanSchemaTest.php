<?php
/**
 * File BooleanSchemaTest.php
 *
 * @author Edward Pfremmer <epfremme@nerdery.com>
 */
namespace Epfremmer\SwaggerBundle\Tests\Entity\Schemas;

use Epfremmer\SwaggerBundle\Entity\ExternalDocumentation;
use Epfremmer\SwaggerBundle\Entity\Schemas\AbstractSchema;
use Epfremmer\SwaggerBundle\Entity\Schemas\BooleanSchema;
use JMS\Serializer\Serializer;
use JMS\Serializer\SerializerBuilder;

/**
 * Class BooleanSchemaTest
 *
 * @package Epfremmer\SwaggerBundle
 * @subpackage Tests\Entity\Schemas
 */
class BooleanSchemaTest extends \PHPUnit_Framework_TestCase
{

    /**
     * @var BooleanSchema
     */
    protected $booleanSchema;

    /**
     * @var Serializer
     */
    protected static $serializer;

    /**
     * {@inheritdoc}
     */
    protected function setUp()
    {
        $this->booleanSchema = new BooleanSchema();
    }

    /**
     * {@inheritdoc}
     */
    public static function setUpBeforeClass()
    {
        self::$serializer = SerializerBuilder::create()->build();
    }

    /**
     * @covers Epfremmer\SwaggerBundle\Entity\Schemas\BooleanSchema::getType
     */
    public function testType()
    {
        $this->assertNotEmpty($this->booleanSchema->getType());
        $this->assertEquals(AbstractSchema::BOOLEAN_TYPE, $this->booleanSchema->getType());
    }

    /**
     * @covers Epfremmer\SwaggerBundle\Entity\Schemas\BooleanSchema
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

        $schema = self::$serializer->deserialize($data, AbstractSchema::class, 'json');

        $this->assertInstanceOf(BooleanSchema::class, $schema);
        $this->assertAttributeEquals('foo', 'format', $schema);
        $this->assertAttributeEquals('bar', 'title', $schema);
        $this->assertAttributeEquals('baz', 'description', $schema);
        $this->assertAttributeEquals('qux', 'example', $schema);
        $this->assertAttributeInstanceOf(ExternalDocumentation::class, 'externalDocs', $schema);

        $json = self::$serializer->serialize($schema, 'json');

        $this->assertJson($json);
        $this->assertJsonStringEqualsJsonString($data, $json);
    }
}
