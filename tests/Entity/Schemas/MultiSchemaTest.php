<?php
/**
 * File MultiSchemaTest.php
 *
 * @author Edward Pfremmer <epfremme@nerdery.com>
 */
namespace Epfremme\Swagger\Tests\Entity\Schemas;

use Epfremme\Swagger\Entity\ExternalDocumentation;
use Epfremme\Swagger\Entity\Schemas\AbstractSchema;
use Epfremme\Swagger\Entity\Schemas\MultiSchema;
use Epfremme\Swagger\Tests\Mixin\SerializerContextTrait;

/**
 * Class MultiSchemaTest
 *
 * @package Epfremme\Swagger
 * @subpackage Tests\Entity\Schemas
 */
class MultiSchemaTest extends \PHPUnit_Framework_TestCase
{
    use SerializerContextTrait;

    /**
     * @var multiSchema
     */
    protected $multiSchema;

    /**
     * {@inheritdoc}
     */
    protected function setUp()
    {
        $this->multiSchema = new multiSchema();
    }

    /**
     * @covers Epfremme\Swagger\Entity\Schemas\multiSchema::getType
     */
    public function testType()
    {
        $this->assertNotEmpty($this->multiSchema->getType());
        $this->assertEquals(AbstractSchema::MULTI_TYPE, $this->multiSchema->getType());
    }

    /**
     * @covers Epfremme\Swagger\Entity\Schemas\multiSchema
     */
    public function testSerialization()
    {
        $data = json_encode([
            'type' => [AbstractSchema::NULL_TYPE, AbstractSchema::STRING_TYPE],
            'format'      => 'foo',
            'title'       => 'bar',
            'description' => 'baz',
            'example'     => 'qux',
            'externalDocs' => (object)[],
        ]);

        $schema = $this->getSerializer()->deserialize($data, AbstractSchema::class, 'json');

        $this->assertInstanceOf(MultiSchema::class, $schema);
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
