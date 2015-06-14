<?php
/**
 * File AnyPrimitiveTraitTest.php
 *
 * @author Edward Pfremmer <epfremme@nerdery.com>
 */
namespace Epfremmer\SwaggerBundle\Tests\Entity\Schemas\Primitives;

use Doctrine\Common\Collections\ArrayCollection;
use Epfremmer\SwaggerBundle\Entity\Schemas\ObjectSchema;
use Epfremmer\SwaggerBundle\Entity\Schemas\Primitives\AnyPrimitive;

/**
 * Class AnyPrimitiveTraitTest
 *
 * @package Epfremmer\SwaggerBundle
 * @subpackage Tests\Entity\Schemas\Primitives
 */
class AnyPrimitiveTraitTest extends \PHPUnit_Framework_TestCase
{

    /**
     * @var AnyPrimitive|\PHPUnit_Framework_MockObject_MockObject
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
        $this->mockTrait = $this->getMockForTrait(AnyPrimitive::class);
        $this->mockClass = get_class($this->mockTrait);
    }

    /**
     * @covers Epfremmer\SwaggerBundle\Entity\Schemas\Primitives\AnyPrimitive::getEnum
     * @covers Epfremmer\SwaggerBundle\Entity\Schemas\Primitives\AnyPrimitive::setEnum
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
     * @covers Epfremmer\SwaggerBundle\Entity\Schemas\Primitives\AnyPrimitive::getAllOf
     * @covers Epfremmer\SwaggerBundle\Entity\Schemas\Primitives\AnyPrimitive::setAllOf
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
     * @covers Epfremmer\SwaggerBundle\Entity\Schemas\Primitives\AnyPrimitive::getAnyOf
     * @covers Epfremmer\SwaggerBundle\Entity\Schemas\Primitives\AnyPrimitive::setAnyOf
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
     * @covers Epfremmer\SwaggerBundle\Entity\Schemas\Primitives\AnyPrimitive::getOneOf
     * @covers Epfremmer\SwaggerBundle\Entity\Schemas\Primitives\AnyPrimitive::setOneOf
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
     * @covers Epfremmer\SwaggerBundle\Entity\Schemas\Primitives\AnyPrimitive::getNot
     * @covers Epfremmer\SwaggerBundle\Entity\Schemas\Primitives\AnyPrimitive::setNot
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
     * @covers Epfremmer\SwaggerBundle\Entity\Schemas\Primitives\AnyPrimitive::getDefinitions
     * @covers Epfremmer\SwaggerBundle\Entity\Schemas\Primitives\AnyPrimitive::setDefinitions
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
}
