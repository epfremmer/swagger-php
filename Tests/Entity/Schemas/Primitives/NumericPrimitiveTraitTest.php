<?php
/**
 * File NumericPrimitiveTraitTest.php
 *
 * @author Edward Pfremmer <epfremme@nerdery.com>
 */
namespace Epfremmer\SwaggerBundle\Tests\Entity\Schemas\Primitives;

use Epfremmer\SwaggerBundle\Entity\Schemas\Primitives\NumericPrimitive;

/**
 * Class NumericPrimitiveTraitTest
 *
 * @package Epfremmer\SwaggerBundle
 * @subpackage Tests\Entity\Schemas\Primitives
 */
class NumericPrimitiveTraitTest extends \PHPUnit_Framework_TestCase
{

    /**
     * @var NumericPrimitive|\PHPUnit_Framework_MockObject_MockObject
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
        $this->mockTrait = $this->getMockForTrait(NumericPrimitive::class);
        $this->mockClass = get_class($this->mockTrait);
    }

    /**
     * @covers Epfremmer\SwaggerBundle\Entity\Schemas\Primitives\NumericPrimitive::getMultipleOf
     * @covers Epfremmer\SwaggerBundle\Entity\Schemas\Primitives\NumericPrimitive::setMultipleOf
     */
    public function testMultipleOf()
    {
        $this->assertClassHasAttribute('multipleOf', $this->mockClass);
        $this->assertInstanceOf($this->mockClass, $this->mockTrait->setMultipleOf(2));
        $this->assertAttributeInternalType('integer', 'multipleOf', $this->mockTrait);
        $this->assertAttributeEquals(2, 'multipleOf', $this->mockTrait);
        $this->assertEquals(2, $this->mockTrait->getMultipleOf());
    }

    /**
     * @covers Epfremmer\SwaggerBundle\Entity\Schemas\Primitives\NumericPrimitive::getMaximum
     * @covers Epfremmer\SwaggerBundle\Entity\Schemas\Primitives\NumericPrimitive::setMaximum
     */
    public function testMaximum()
    {
        $this->assertClassHasAttribute('maximum', $this->mockClass);
        $this->assertInstanceOf($this->mockClass, $this->mockTrait->setMaximum(10));
        $this->assertAttributeInternalType('integer', 'maximum', $this->mockTrait);
        $this->assertAttributeEquals(10, 'maximum', $this->mockTrait);
        $this->assertEquals(10, $this->mockTrait->getMaximum());
    }

    /**
     * @covers Epfremmer\SwaggerBundle\Entity\Schemas\Primitives\NumericPrimitive::getExclusiveMaximum
     * @covers Epfremmer\SwaggerBundle\Entity\Schemas\Primitives\NumericPrimitive::setExclusiveMaximum
     */
    public function testExclusiveMaximum()
    {
        $this->assertClassHasAttribute('exclusiveMaximum', $this->mockClass);
        $this->assertInstanceOf($this->mockClass, $this->mockTrait->setExclusiveMaximum(10));
        $this->assertAttributeInternalType('integer', 'exclusiveMaximum', $this->mockTrait);
        $this->assertAttributeEquals(10, 'exclusiveMaximum', $this->mockTrait);
        $this->assertEquals(10, $this->mockTrait->getExclusiveMaximum());
    }
}
