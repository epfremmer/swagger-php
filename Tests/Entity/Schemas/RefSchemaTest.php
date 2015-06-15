<?php
/**
 * File RefSchemaTest.php
 *
 * @author Edward Pfremmer <epfremme@nerdery.com>
 */
namespace Epfremmer\SwaggerBundle\Tests\Entity\Schemas;

use Epfremmer\SwaggerBundle\Entity\ExternalDocumentation;
use Epfremmer\SwaggerBundle\Entity\Schemas\AbstractSchema;
use Epfremmer\SwaggerBundle\Entity\Schemas\RefSchema;
use Epfremmer\SwaggerBundle\Tests\Mixin\SerializerContextTrait;

/**
 * Class RefSchemaTest
 *
 * @package Epfremmer\SwaggerBundle
 * @subpackage Tests\Entity\Schemas
 */
class RefSchemaTest extends \PHPUnit_Framework_TestCase
{
    use SerializerContextTrait;

    /**
     * @var RefSchema
     */
    protected $refSchema;

    /**
     * {@inheritdoc}
     */
    protected function setUp()
    {
        $this->refSchema = new RefSchema();
    }

    /**
     * @covers Epfremmer\SwaggerBundle\Entity\Schemas\RefSchema::getType
     */
    public function testType()
    {
        $this->assertNotEmpty($this->refSchema->getType());
        $this->assertEquals(AbstractSchema::REF_TYPE, $this->refSchema->getType());
    }

    /**
     * @covers Epfremmer\SwaggerBundle\Entity\Schemas\RefSchema::getRef
     * @covers Epfremmer\SwaggerBundle\Entity\Schemas\RefSchema::setRef
     */
    public function testRef()
    {
        $this->assertClassHasAttribute('ref', RefSchema::class);
        $this->assertInstanceOf(RefSchema::class, $this->refSchema->setRef('#/foo'));
        $this->assertAttributeEquals('#/foo', 'ref', $this->refSchema);
        $this->assertEquals('#/foo', $this->refSchema->getRef());
    }

    /**
     * @covers Epfremmer\SwaggerBundle\Entity\Schemas\BooleanSchema
     */
    public function testSerialization()
    {
        $data = json_encode([
            '$ref' => '#/foo',
            'type' => AbstractSchema::REF_TYPE,
            'format'      => 'foo',
            'title'       => 'bar',
            'description' => 'baz',
            'example'     => 'qux',
            'externalDocs' => (object)[],
        ]);

        $schema = self::$serializer->deserialize($data, AbstractSchema::class, 'json');

        $this->assertInstanceOf(RefSchema::class, $schema);
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
