<?php
/**
 * File AnyPrimitiveTraitTest.php
 *
 * @author Edward Pfremmer <epfremme@nerdery.com>
 */
namespace Epfremme\Swagger\Tests\Entity\Mixin;

use Doctrine\Common\Collections\ArrayCollection;
use Epfremme\Swagger\Entity\Schemas\AbstractSchema;
use Epfremme\Swagger\Entity\Schemas\ObjectSchema;
use Epfremme\Swagger\Entity\Mixin\Primitives\AnyPrimitiveTrait;
use Epfremme\Swagger\Tests\Mixin\SerializerContextTrait;

/**
 * Class AnyPrimitiveTraitTest
 *
 * @package Epfremme\Swagger
 * @subpackage Tests\Entity\Schemas\Primitives
 */
class AnyPrimitiveTraitTest extends \PHPUnit_Framework_TestCase
{
    use SerializerContextTrait;

    /**
     * @var AnyPrimitiveTrait|\PHPUnit_Framework_MockObject_MockObject
     */
    protected $mockTrait;

    /**
     * Mock Classname
     * @var string
     */
    protected $mockClass;

    /**
     * {@inheritdoc}
     */
    protected function setUp()
    {
        $this->mockTrait = $this->getMockForTrait(AnyPrimitiveTrait::class);
        $this->mockClass = get_class($this->mockTrait);
    }

    /**
     * @covers Epfremme\Swagger\Entity\Mixin\Primitives\AnyPrimitiveTrait::getEnum
     * @covers Epfremme\Swagger\Entity\Mixin\Primitives\AnyPrimitiveTrait::setEnum
     */
    public function testEnum()
    {
        $enums = ['foo', 'bar', 'baz'];

        $this->assertClassHasAttribute('enum', $this->mockClass);
        $this->assertInstanceOf($this->mockClass, $this->mockTrait->setEnum($enums));
        $this->assertAttributeInternalType('array', 'enum', $this->mockTrait);
        $this->assertAttributeEquals($enums, 'enum', $this->mockTrait);
        $this->assertEquals($enums, $this->mockTrait->getEnum());
    }

    /**
     * @covers Epfremme\Swagger\Entity\Mixin\Primitives\AnyPrimitiveTrait::getAllOf
     * @covers Epfremme\Swagger\Entity\Mixin\Primitives\AnyPrimitiveTrait::setAllOf
     */
    public function testAllOf()
    {
        $allOf = ['foo', 'bar', 'baz'];

        $this->assertClassHasAttribute('allOf', $this->mockClass);
        $this->assertInstanceOf($this->mockClass, $this->mockTrait->setAllOf($allOf));
        $this->assertAttributeInternalType('array', 'allOf', $this->mockTrait);
        $this->assertAttributeEquals($allOf, 'allOf', $this->mockTrait);
        $this->assertEquals($allOf, $this->mockTrait->getAllOf());
    }

    /**
     * @covers Epfremme\Swagger\Entity\Mixin\Primitives\AnyPrimitiveTrait::getAnyOf
     * @covers Epfremme\Swagger\Entity\Mixin\Primitives\AnyPrimitiveTrait::setAnyOf
     */
    public function testAnyOf()
    {
        $anyOf = ['foo', 'bar', 'baz'];

        $this->assertClassHasAttribute('anyOf', $this->mockClass);
        $this->assertInstanceOf($this->mockClass, $this->mockTrait->setAnyOf($anyOf));
        $this->assertAttributeInternalType('array', 'anyOf', $this->mockTrait);
        $this->assertAttributeEquals($anyOf, 'anyOf', $this->mockTrait);
        $this->assertEquals($anyOf, $this->mockTrait->getAnyOf());
    }

    /**
     * @covers Epfremme\Swagger\Entity\Mixin\Primitives\AnyPrimitiveTrait::getOneOf
     * @covers Epfremme\Swagger\Entity\Mixin\Primitives\AnyPrimitiveTrait::setOneOf
     */
    public function testOneOf()
    {
        $oneOf = ['foo', 'bar', 'baz'];

        $this->assertClassHasAttribute('oneOf', $this->mockClass);
        $this->assertInstanceOf($this->mockClass, $this->mockTrait->setOneOf($oneOf));
        $this->assertAttributeInternalType('array', 'oneOf', $this->mockTrait);
        $this->assertAttributeEquals($oneOf, 'oneOf', $this->mockTrait);
        $this->assertEquals($oneOf, $this->mockTrait->getOneOf());
    }

    /**
     * @covers Epfremme\Swagger\Entity\Mixin\Primitives\AnyPrimitiveTrait::getNot
     * @covers Epfremme\Swagger\Entity\Mixin\Primitives\AnyPrimitiveTrait::setNot
     */
    public function testNot()
    {
        $not = ['foo', 'bar', 'baz'];

        $this->assertClassHasAttribute('not', $this->mockClass);
        $this->assertInstanceOf($this->mockClass, $this->mockTrait->setNot($not));
        $this->assertAttributeInternalType('array', 'not', $this->mockTrait);
        $this->assertAttributeEquals($not, 'not', $this->mockTrait);
        $this->assertEquals($not, $this->mockTrait->getNot());
    }

    /**
     * @covers Epfremme\Swagger\Entity\Mixin\Primitives\AnyPrimitiveTrait::getDefinitions
     * @covers Epfremme\Swagger\Entity\Mixin\Primitives\AnyPrimitiveTrait::setDefinitions
     */
    public function testDefinitions()
    {
        $definitions = new ArrayCollection([
            'name' => new ObjectSchema(),
        ]);

        $this->assertClassHasAttribute('definitions', $this->mockClass);
        $this->assertInstanceOf($this->mockClass, $this->mockTrait->setDefinitions($definitions));
        $this->assertAttributeInstanceOf(ArrayCollection::class, 'definitions', $this->mockTrait);
        $this->assertAttributeEquals($definitions, 'definitions', $this->mockTrait);
        $this->assertEquals($definitions, $this->mockTrait->getDefinitions());
        $this->assertContainsOnlyInstancesOf(ObjectSchema::class, $this->mockTrait->getDefinitions());
        $this->assertCount(1, $this->mockTrait->getDefinitions());
    }

    /**
     * @covers Epfremme\Swagger\Entity\Mixin\Primitives\AnyPrimitiveTrait
     */
    public function testSerialization()
    {
        $data = json_encode([
            'type'  => AbstractSchema::OBJECT_TYPE,
            'enum'  => ['foo', 'bar'],
            'allOf' => ['foo'],
            'anyOf' => ['foo', 'bar', 'baz'],
            'oneOf' => ['foo', 'bar', 'baz'],
            'not'   => ['qux'],
            'definitions' => [
                'def' => [
                    'type' => AbstractSchema::OBJECT_TYPE,
                    'format'       => 'foo',
                    'title'        => 'bar',
                    'description'  => 'baz',
                    'example'      => 'qux',
                    'externalDocs' => (object)[],
                ]
            ],
        ]);

        $primitive = $this->getSerializer()->deserialize($data, AbstractSchema::class, 'json');

        $this->assertInstanceOf(ObjectSchema::class, $primitive);
        $this->assertAttributeEquals(['foo', 'bar'], 'enum', $primitive);
        $this->assertAttributeEquals(['foo'], 'allOf', $primitive);
        $this->assertAttributeEquals(['foo', 'bar', 'baz'], 'anyOf', $primitive);
        $this->assertAttributeEquals(['foo', 'bar', 'baz'], 'oneOf', $primitive);
        $this->assertAttributeEquals(['qux'], 'not', $primitive);
        $this->assertAttributeInstanceOf(ArrayCollection::class, 'definitions', $primitive);
        $this->assertContainsOnlyInstancesOf(ObjectSchema::class, $primitive->getDefinitions());
        $this->assertInstanceOf(ObjectSchema::class, $primitive->getDefinitions()->get('def'));

        $json = $this->getSerializer()->serialize($primitive, 'json');

        $this->assertJson($json);
        $this->assertJsonStringEqualsJsonString($data, $json);
    }
}
