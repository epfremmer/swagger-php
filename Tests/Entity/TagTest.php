<?php
/**
 * File TagTest.php
 *
 * @author Edward Pfremmer <epfremme@nerdery.com>
 */
namespace Epfremmer\SwaggerBundle\Tests\Entity;

use Epfremmer\SwaggerBundle\Entity\ExternalDocumentation;
use Epfremmer\SwaggerBundle\Entity\Tag;
use JMS\Serializer\Serializer;
use JMS\Serializer\SerializerBuilder;

/**
 * Class TagTest
 *
 * @package Epfremmer\SwaggerBundle
 * @subpackage Tests\Entity
 */
class TagTest extends \PHPUnit_Framework_TestCase
{

    /**
     * @var Tag
     */
    protected $tag;

    /**
     * @var Serializer
     */
    protected static $serializer;

    /**
     * {@inheritdoc}
     */
    protected function setUp()
    {
        $this->tag = new Tag();
    }

    /**
     * {@inheritdoc}
     */
    public static function setUpBeforeClass()
    {
        self::$serializer = SerializerBuilder::create()->build();
    }

    /**
     * @covers Epfremmer\SwaggerBundle\Entity\Tag::getName
     * @covers Epfremmer\SwaggerBundle\Entity\Tag::setName
     */
    public function testName()
    {
        $this->assertClassHasAttribute('name', Tag::class);
        $this->assertInstanceOf(Tag::class, $this->tag->setName('foo'));
        $this->assertAttributeEquals('foo', 'name', $this->tag);
        $this->assertEquals('foo', $this->tag->getName());
    }

    /**
     * @covers Epfremmer\SwaggerBundle\Entity\Tag::getDescription
     * @covers Epfremmer\SwaggerBundle\Entity\Tag::setDescription
     */
    public function testDescription()
    {
        $this->assertClassHasAttribute('description', Tag::class);
        $this->assertInstanceOf(Tag::class, $this->tag->setDescription('foo'));
        $this->assertAttributeEquals('foo', 'description', $this->tag);
        $this->assertEquals('foo', $this->tag->getDescription());
    }

    /**
     * @covers Epfremmer\SwaggerBundle\Entity\Tag::getExternalDocs
     * @covers Epfremmer\SwaggerBundle\Entity\Tag::setExternalDocs
     */
    public function testExternalDocs()
    {
        $externalDocs = new ExternalDocumentation();

        $this->assertClassHasAttribute('externalDocs', Tag::class);
        $this->assertInstanceOf(Tag::class, $this->tag->setExternalDocs($externalDocs));
        $this->assertAttributeInstanceOf(ExternalDocumentation::class, 'externalDocs', $this->tag);
        $this->assertAttributeEquals($externalDocs, 'externalDocs', $this->tag);
        $this->assertEquals($externalDocs, $this->tag->getExternalDocs());
    }

    /**
     * @covers Epfremmer\SwaggerBundle\Entity\Tag
     */
    public function testDeserialize()
    {
        $data = json_encode([
            'name'         => 'foo',
            'description'  => 'bar',
            'externalDocs' => (object)[],
        ]);

        $tag = self::$serializer->deserialize($data, Tag::class, 'json');

        $this->assertInstanceOf(Tag::class, $tag);
        $this->assertAttributeEquals('foo', 'name', $tag);
        $this->assertAttributeEquals('bar', 'description', $tag);
        $this->assertAttributeInstanceOf(ExternalDocumentation::class, 'externalDocs', $tag);
    }
}
