<?php
/**
 * File ObjectPrimitiveTraitTest.php
 *
 * @author Edward Pfremmer <epfremme@nerdery.com>
 */
namespace Epfremmer\SwaggerBundle\Tests\Entity\Schemas\Primitives;

use Doctrine\Common\Collections\ArrayCollection;
use Epfremmer\SwaggerBundle\Entity\Schemas\ObjectSchema;
use Epfremmer\SwaggerBundle\Entity\Schemas\Primitives\ObjectPrimitive;

/**
 * Class ObjectPrimitiveTraitTest
 *
 * @package Epfremmer\SwaggerBundle
 * @subpackage Tests\Entity\Schemas\Primitives
 */
class ObjectPrimitiveTraitTest extends \PHPUnit_Framework_TestCase
{

    /**
     * @var ObjectPrimitive|\PHPUnit_Framework_MockObject_MockObject
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
        $this->mockTrait = $this->getMockForTrait(ObjectPrimitive::class);
        $this->mockClass = get_class($this->mockTrait);
    }

    /**
     * @covers Epfremmer\SwaggerBundle\Entity\Schemas\Primitives\ObjectPrimitive::getMaxProperties
     * @covers Epfremmer\SwaggerBundle\Entity\Schemas\Primitives\ObjectPrimitive::setMaxProperties
     */
    public function testMaxProperties()
    {
        $this->assertClassHasAttribute('maxProperties', $this->mockClass);
        $this->assertInstanceOf($this->mockClass, $this->mockTrait->setMaxProperties(5));
        $this->assertAttributeInternalType('integer', 'maxProperties', $this->mockTrait);
        $this->assertAttributeEquals(5, 'maxProperties', $this->mockTrait);
        $this->assertEquals(5, $this->mockTrait->getMaxProperties());
    }

    /**
     * @covers Epfremmer\SwaggerBundle\Entity\Schemas\Primitives\ObjectPrimitive::getMinProperties
     * @covers Epfremmer\SwaggerBundle\Entity\Schemas\Primitives\ObjectPrimitive::setMinProperties
     */
    public function testMinProperties()
    {
        $this->assertClassHasAttribute('minProperties', $this->mockClass);
        $this->assertInstanceOf($this->mockClass, $this->mockTrait->setMinProperties(1));
        $this->assertAttributeInternalType('integer', 'minProperties', $this->mockTrait);
        $this->assertAttributeEquals(1, 'minProperties', $this->mockTrait);
        $this->assertEquals(1, $this->mockTrait->getMinProperties());
    }

    /**
     * @covers Epfremmer\SwaggerBundle\Entity\Schemas\Primitives\ObjectPrimitive::getRequired
     * @covers Epfremmer\SwaggerBundle\Entity\Schemas\Primitives\ObjectPrimitive::setRequired
     */
    public function testRequired()
    {
        $required = ['foo', 'bar', 'baz'];

        $this->assertClassHasAttribute('required', $this->mockClass);
        $this->assertInstanceOf($this->mockClass, $this->mockTrait->setRequired($required));
        $this->assertAttributeInternalType('array', 'required', $this->mockTrait);
        $this->assertAttributeEquals($required, 'required', $this->mockTrait);
        $this->assertEquals($required, $this->mockTrait->getRequired());
    }

    /**
     * @covers Epfremmer\SwaggerBundle\Entity\Schemas\Primitives\ObjectPrimitive::getProperties
     * @covers Epfremmer\SwaggerBundle\Entity\Schemas\Primitives\ObjectPrimitive::setProperties
     */
    public function testProperties()
    {
        $properties = $definitions = new ArrayCollection([
            'name' => new ObjectSchema(),
        ]);;

        $this->assertClassHasAttribute('properties', $this->mockClass);
        $this->assertInstanceOf($this->mockClass, $this->mockTrait->setProperties($properties));
        $this->assertAttributeInstanceOf(ArrayCollection::class, 'properties', $this->mockTrait);
        $this->assertAttributeEquals($properties, 'properties', $this->mockTrait);
        $this->assertEquals($properties, $this->mockTrait->getProperties());
        $this->assertContainsOnlyInstancesOf(ObjectSchema::class, $this->mockTrait->getProperties());
        $this->assertCount(1, $this->mockTrait->getProperties());
    }

    /**
     * @covers Epfremmer\SwaggerBundle\Entity\Schemas\Primitives\ObjectPrimitive::isAdditionalProperties
     * @covers Epfremmer\SwaggerBundle\Entity\Schemas\Primitives\ObjectPrimitive::setAdditionalProperties
     */
    public function testAdditionalProperties()
    {
        $this->assertClassHasAttribute('additionalProperties', $this->mockClass);
        $this->assertInstanceOf($this->mockClass, $this->mockTrait->setAdditionalProperties(true));
        $this->assertAttributeInternalType('boolean', 'additionalProperties', $this->mockTrait);
        $this->assertAttributeEquals(true, 'additionalProperties', $this->mockTrait);
        $this->assertTrue($this->mockTrait->isAdditionalProperties());
    }

    /**
     * @covers Epfremmer\SwaggerBundle\Entity\Schemas\Primitives\ObjectPrimitive::getPatternProperties
     * @covers Epfremmer\SwaggerBundle\Entity\Schemas\Primitives\ObjectPrimitive::setPatternProperties
     */
    public function testPatternProperties()
    {
        $this->assertClassHasAttribute('patternProperties', $this->mockClass);
        $this->assertInstanceOf($this->mockClass, $this->mockTrait->setPatternProperties('foo'));
        $this->assertAttributeInternalType('string', 'patternProperties', $this->mockTrait);
        $this->assertAttributeEquals('foo', 'patternProperties', $this->mockTrait);
        $this->assertEquals('foo', $this->mockTrait->getPatternProperties());
    }

    /**
     * @covers Epfremmer\SwaggerBundle\Entity\Schemas\Primitives\ObjectPrimitive::getDependencies
     * @covers Epfremmer\SwaggerBundle\Entity\Schemas\Primitives\ObjectPrimitive::setDependencies
     */
    public function testDependencies()
    {
        $dependencies = ['foo', 'bar', 'baz'];

        $this->assertClassHasAttribute('dependencies', $this->mockClass);
        $this->assertInstanceOf($this->mockClass, $this->mockTrait->setDependencies($dependencies));
        $this->assertAttributeInternalType('array', 'dependencies', $this->mockTrait);
        $this->assertAttributeEquals($dependencies, 'dependencies', $this->mockTrait);
        $this->assertEquals($dependencies, $this->mockTrait->getDependencies());
    }
}
