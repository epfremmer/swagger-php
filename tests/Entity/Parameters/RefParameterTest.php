<?php
/**
 * File RefParameterTest.php
 *
 * @author Edward Pfremmer <epfremme@nerdery.com>
 */
namespace Epfremme\Swagger\Tests\Entity\Schemas;

use Epfremme\Swagger\Entity\Parameters\AbstractParameter;
use Epfremme\Swagger\Entity\Parameters\RefParameter;
use Epfremme\Swagger\Entity\Schemas\AbstractSchema;
use Epfremme\Swagger\Tests\Mixin\SerializerContextTrait;

/**
 * Class RefParameterTest
 *
 * @package Epfremme\Swagger
 * @subpackage Tests\Entity\Schemas
 */
class RefParameterTest extends \PHPUnit_Framework_TestCase
{
    use SerializerContextTrait;

    /**
     * @var RefParameter
     */
    protected $refSchema;

    /**
     * {@inheritdoc}
     */
    protected function setUp()
    {
        $this->refSchema = new RefParameter();
    }

    /**
     * @covers Epfremme\Swagger\Entity\Parameters\RefParameter::getType
     */
    public function testType()
    {
        $this->assertNotEmpty($this->refSchema->getType());
        $this->assertEquals(RefParameter::REF_TYPE, $this->refSchema->getType());
    }

    /**
     * @covers Epfremme\Swagger\Entity\Parameters\RefParameter::getRef
     * @covers Epfremme\Swagger\Entity\Parameters\RefParameter::setRef
     */
    public function testRef()
    {
        $this->assertClassHasAttribute('ref', RefParameter::class);
        $this->assertInstanceOf(RefParameter::class, $this->refSchema->setRef('#/definitions/foo'));
        $this->assertAttributeEquals('#/definitions/foo', 'ref', $this->refSchema);
        $this->assertEquals('#/definitions/foo', $this->refSchema->getRef());
    }

    /**
     * @covers Epfremme\Swagger\Entity\Parameters\RefParameter::getTitle
     * @covers Epfremme\Swagger\Entity\Parameters\RefParameter::setTitle
     */
    public function testTitle()
    {
        $this->assertClassHasAttribute('title', AbstractSchema::class);
        $this->assertInstanceOf(RefParameter::class, $this->refSchema->setTitle('foo'));
        $this->assertAttributeEquals('foo', 'title', $this->refSchema);
        $this->assertEquals('foo', $this->refSchema->getTitle());
    }

    /**
     * @covers Epfremme\Swagger\Entity\Parameters\RefParameter::getDescription
     * @covers Epfremme\Swagger\Entity\Parameters\RefParameter::setDescription
     */
    public function testDescription()
    {
        $this->assertClassHasAttribute('description', AbstractSchema::class);
        $this->assertInstanceOf(RefParameter::class, $this->refSchema->setDescription('foo'));
        $this->assertAttributeEquals('foo', 'description', $this->refSchema);
        $this->assertEquals('foo', $this->refSchema->getDescription());
    }

    /**
     * @covers Epfremme\Swagger\Entity\Parameters\RefParameter
     */
    public function testSerialization()
    {
        $data = json_encode([
            '$ref'        => '#/parameters/foo',
            'title'       => 'foo',
            'description' => 'bar',
        ]);

        $schema = $this->getSerializer()->deserialize($data, AbstractParameter::class, 'json');

        $this->assertInstanceOf(RefParameter::class, $schema);
        $this->assertAttributeEquals('#/parameters/foo', 'ref', $schema);
        $this->assertAttributeEquals('foo', 'title', $schema);
        $this->assertAttributeEquals('bar', 'description', $schema);

        $json = $this->getSerializer()->serialize($schema, 'json');

        $this->assertJson($json);
        $this->assertJsonStringEqualsJsonString($data, $json);
    }
}
