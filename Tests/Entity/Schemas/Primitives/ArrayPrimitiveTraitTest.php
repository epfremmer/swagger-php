<?php
/**
 * File ArrayPrimitiveTraitTest.php
 *
 * @author Edward Pfremmer <epfremme@nerdery.com>
 */
namespace Epfremmer\SwaggerBundle\Tests\Entity\Schemas\Primitives;

use Doctrine\Common\Collections\ArrayCollection;
use Epfremmer\SwaggerBundle\Entity\Schemas\ObjectSchema;
use Epfremmer\SwaggerBundle\Entity\Schemas\Primitives\ArrayPrimitive;
use JMS\Serializer\Serializer;
use JMS\Serializer\SerializerBuilder;

/**
 * Class ArrayPrimitiveTraitTest
 *
 * @package Epfremmer\SwaggerBundle
 * @subpackage Tests\Entity\Schemas\Primitives
 */
class ArrayPrimitiveTraitTest extends \PHPUnit_Framework_TestCase
{

    /**
     * @var ArrayPrimitive|\PHPUnit_Framework_MockObject_MockObject
     */
    protected $mockTrait;

    /**
     * Mock Classname
     * @var string
     */
    protected $mockClass;

    /**
     * @var Serializer
     */
    protected static $serializer;

    /**
     * {@inheritdoc}
     */
    protected function setUp()
    {
        $this->mockTrait = $this->getMockForTrait(ArrayPrimitive::class);
        $this->mockClass = get_class($this->mockTrait);
    }

    /**
     * @covers Epfremmer\SwaggerBundle\Entity\Schemas\Primitives\ArrayPrimitive::getItems
     * @covers Epfremmer\SwaggerBundle\Entity\Schemas\Primitives\ArrayPrimitive::setItems
     */
    public function testItems()
    {
        $items = ['foo', 'bar', 'baz'];

        $this->assertClassHasAttribute('items', $this->mockClass);
        $this->assertInstanceOf($this->mockClass, $this->mockTrait->setItems($items));
        $this->assertAttributeInternalType('array', 'items', $this->mockTrait);
        $this->assertAttributeEquals($items, 'items', $this->mockTrait);
        $this->assertEquals($items, $this->mockTrait->getItems());
    }

    /**
     * @covers Epfremmer\SwaggerBundle\Entity\Schemas\Primitives\ArrayPrimitive::isAdditionalItems
     * @covers Epfremmer\SwaggerBundle\Entity\Schemas\Primitives\ArrayPrimitive::setAdditionalItems
     */
    public function testAdditionalItems()
    {
        $this->assertClassHasAttribute('additionalItems', $this->mockClass);
        $this->assertInstanceOf($this->mockClass, $this->mockTrait->setAdditionalItems(true));
        $this->assertAttributeInternalType('boolean', 'additionalItems', $this->mockTrait);
        $this->assertAttributeEquals(true, 'additionalItems', $this->mockTrait);
        $this->assertTrue($this->mockTrait->isAdditionalItems());
    }

    /**
     * @covers Epfremmer\SwaggerBundle\Entity\Schemas\Primitives\ArrayPrimitive::getMaxItems
     * @covers Epfremmer\SwaggerBundle\Entity\Schemas\Primitives\ArrayPrimitive::setMaxItems
     */
    public function testMaxItems()
    {
        $this->assertClassHasAttribute('maxItems', $this->mockClass);
        $this->assertInstanceOf($this->mockClass, $this->mockTrait->setMaxItems(5));
        $this->assertAttributeInternalType('integer', 'maxItems', $this->mockTrait);
        $this->assertAttributeEquals(5, 'maxItems', $this->mockTrait);
        $this->assertEquals(5, $this->mockTrait->getMaxItems());
    }

    /**
     * @covers Epfremmer\SwaggerBundle\Entity\Schemas\Primitives\ArrayPrimitive::getMinItems
     * @covers Epfremmer\SwaggerBundle\Entity\Schemas\Primitives\ArrayPrimitive::setMinItems
     */
    public function testMinItems()
    {
        $this->assertClassHasAttribute('minItems', $this->mockClass);
        $this->assertInstanceOf($this->mockClass, $this->mockTrait->setMinItems(2));
        $this->assertAttributeInternalType('integer', 'minItems', $this->mockTrait);
        $this->assertAttributeEquals(2, 'minItems', $this->mockTrait);
        $this->assertEquals(2, $this->mockTrait->getMinItems());
    }

    /**
     * @covers Epfremmer\SwaggerBundle\Entity\Schemas\Primitives\ArrayPrimitive::isUniqueItems
     * @covers Epfremmer\SwaggerBundle\Entity\Schemas\Primitives\ArrayPrimitive::setUniqueItems
     */
    public function testUniqueItems()
    {
        $this->assertClassHasAttribute('uniqueItems', $this->mockClass);
        $this->assertInstanceOf($this->mockClass, $this->mockTrait->setUniqueItems(true));
        $this->assertAttributeInternalType('boolean', 'uniqueItems', $this->mockTrait);
        $this->assertAttributeEquals(true, 'uniqueItems', $this->mockTrait);
        $this->assertTrue($this->mockTrait->isUniqueItems());
    }
}
