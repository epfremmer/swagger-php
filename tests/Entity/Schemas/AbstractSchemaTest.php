<?php
/**
 * File AbstractSchemaTest.php
 *
 * @author Edward Pfremmer <epfremme@nerdery.com>
 */
namespace Epfremme\Swagger\Tests\Entity\Schemas;

use Epfremme\Swagger\Entity\ExternalDocumentation;
use Epfremme\Swagger\Entity\Schemas\AbstractSchema;

/**
 * Class AbstractSchemaTest
 *
 * @package Epfremme\Swagger
 * @subpackage Tests\Entity\Schemas
 */
class AbstractSchemaTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var AbstractSchema|\PHPUnit_Framework_MockObject_MockObject
     */
    protected $mockSchema;

    /**
     * {@inheritdoc}
     */
    protected function setUp()
    {
        $this->mockSchema = $this->getMockForAbstractClass(AbstractSchema::class);
    }

    /**
     * @covers Epfremme\Swagger\Entity\Schemas\AbstractSchema::getDefault
     * @covers Epfremme\Swagger\Entity\Schemas\AbstractSchema::setDefault
     */
    public function testDefault()
    {
        $this->assertClassHasAttribute('default', AbstractSchema::class);
        $this->assertInstanceOf(AbstractSchema::class, $this->mockSchema->setDefault('foo'));
        $this->assertAttributeEquals('foo', 'default', $this->mockSchema);
        $this->assertEquals('foo', $this->mockSchema->getDefault());
    }

    /**
     * @covers Epfremme\Swagger\Entity\Schemas\AbstractSchema::getFormat
     * @covers Epfremme\Swagger\Entity\Schemas\AbstractSchema::setFormat
     */
    public function testFormat()
    {
        $this->assertClassHasAttribute('format', AbstractSchema::class);
        $this->assertInstanceOf(AbstractSchema::class, $this->mockSchema->setFormat('foo'));
        $this->assertAttributeEquals('foo', 'format', $this->mockSchema);
        $this->assertEquals('foo', $this->mockSchema->getFormat());
    }

    /**
     * @covers Epfremme\Swagger\Entity\Schemas\AbstractSchema::getTitle
     * @covers Epfremme\Swagger\Entity\Schemas\AbstractSchema::setTitle
     */
    public function testTitle()
    {
        $this->assertClassHasAttribute('title', AbstractSchema::class);
        $this->assertInstanceOf(AbstractSchema::class, $this->mockSchema->setTitle('foo'));
        $this->assertAttributeEquals('foo', 'title', $this->mockSchema);
        $this->assertEquals('foo', $this->mockSchema->getTitle());
    }

    /**
     * @covers Epfremme\Swagger\Entity\Schemas\AbstractSchema::getDescription
     * @covers Epfremme\Swagger\Entity\Schemas\AbstractSchema::setDescription
     */
    public function testDescription()
    {
        $this->assertClassHasAttribute('description', AbstractSchema::class);
        $this->assertInstanceOf(AbstractSchema::class, $this->mockSchema->setDescription('foo'));
        $this->assertAttributeEquals('foo', 'description', $this->mockSchema);
        $this->assertEquals('foo', $this->mockSchema->getDescription());
    }

    /**
     * @covers Epfremme\Swagger\Entity\Schemas\AbstractSchema::getExample
     * @covers Epfremme\Swagger\Entity\Schemas\AbstractSchema::setExample
     */
    public function testExample()
    {
        $this->assertClassHasAttribute('example', AbstractSchema::class);
        $this->assertInstanceOf(AbstractSchema::class, $this->mockSchema->setExample('foo'));
        $this->assertAttributeEquals('foo', 'example', $this->mockSchema);
        $this->assertEquals('foo', $this->mockSchema->getExample());
    }

    /**
     * @covers Epfremme\Swagger\Entity\Schemas\AbstractSchema::getExternalDocs
     * @covers Epfremme\Swagger\Entity\Schemas\AbstractSchema::setExternalDocs
     */
    public function testExternalDocs()
    {
        $externalDocs = new ExternalDocumentation();

        $this->assertClassHasAttribute('externalDocs', AbstractSchema::class);
        $this->assertInstanceOf(AbstractSchema::class, $this->mockSchema->setExternalDocs($externalDocs));
        $this->assertAttributeInstanceOf(ExternalDocumentation::class, 'externalDocs', $this->mockSchema);
        $this->assertAttributeEquals($externalDocs, 'externalDocs', $this->mockSchema);
        $this->assertEquals($externalDocs, $this->mockSchema->getExternalDocs());
    }
}
