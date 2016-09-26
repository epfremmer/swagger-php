<?php
/**
 * File TagTest.php
 *
 * @author Edward Pfremmer <epfremme@nerdery.com>
 */
namespace Epfremme\Swagger\Tests\Entity;

use Epfremme\Swagger\Entity\ExternalDocumentation;
use Epfremme\Swagger\Entity\Tag;
use Epfremme\Swagger\Tests\Mixin\SerializerContextTrait;

/**
 * Class TagTest
 *
 * @package Epfremme\Swagger
 * @subpackage Tests\Entity
 */
class TagTest extends \PHPUnit_Framework_TestCase
{
    use SerializerContextTrait;

    /**
     * @var Tag
     */
    protected $tag;

    /**
     * {@inheritdoc}
     */
    protected function setUp()
    {
        $this->tag = new Tag();
    }

    /**
     * @covers Epfremme\Swagger\Entity\Tag::getName
     * @covers Epfremme\Swagger\Entity\Tag::setName
     */
    public function testName()
    {
        $this->assertClassHasAttribute('name', Tag::class);
        $this->assertInstanceOf(Tag::class, $this->tag->setName('foo'));
        $this->assertAttributeEquals('foo', 'name', $this->tag);
        $this->assertEquals('foo', $this->tag->getName());
    }

    /**
     * @covers Epfremme\Swagger\Entity\Tag::getDescription
     * @covers Epfremme\Swagger\Entity\Tag::setDescription
     */
    public function testDescription()
    {
        $this->assertClassHasAttribute('description', Tag::class);
        $this->assertInstanceOf(Tag::class, $this->tag->setDescription('foo'));
        $this->assertAttributeEquals('foo', 'description', $this->tag);
        $this->assertEquals('foo', $this->tag->getDescription());
    }

    /**
     * @covers Epfremme\Swagger\Entity\Tag::getExternalDocs
     * @covers Epfremme\Swagger\Entity\Tag::setExternalDocs
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
     * @covers Epfremme\Swagger\Entity\Tag
     */
    public function testSerialize()
    {
        $data = json_encode([
            'name'         => 'foo',
            'description'  => 'bar',
            'externalDocs' => (object)[],
        ]);

        $tag = $this->getSerializer()->deserialize($data, Tag::class, 'json');

        $this->assertInstanceOf(Tag::class, $tag);
        $this->assertAttributeEquals('foo', 'name', $tag);
        $this->assertAttributeEquals('bar', 'description', $tag);
        $this->assertAttributeInstanceOf(ExternalDocumentation::class, 'externalDocs', $tag);

        $json = $this->getSerializer()->serialize($tag, 'json');

        $this->assertJson($json);
        $this->assertJsonStringEqualsJsonString($data, $json);
    }
}
