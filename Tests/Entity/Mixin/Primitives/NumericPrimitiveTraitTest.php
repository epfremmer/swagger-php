<?php
/**
 * File NumericPrimitiveTraitTest.php
 *
 * @author Edward Pfremmer <epfremme@nerdery.com>
 */
namespace Epfremmer\SwaggerBundle\Tests\Entity\Mixin;

use Epfremmer\SwaggerBundle\Entity\Mixin\Primitives\NumericPrimitiveTrait;

/**
 * Class NumericPrimitiveTraitTest
 *
 * @package Epfremmer\SwaggerBundle
 * @subpackage Tests\Entity\Schemas\Primitives
 */
class NumericPrimitiveTraitTest extends \PHPUnit_Framework_TestCase
{

    /**
     * @var NumericPrimitiveTrait|\PHPUnit_Framework_MockObject_MockObject
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
        $this->mockTrait = $this->getMockForTrait(NumericPrimitiveTrait::class);
        $this->mockClass = get_class($this->mockTrait);
    }

    /**
     * @covers Epfremmer\SwaggerBundle\Entity\Mixin\Primitives\NumericPrimitiveTrait::getMultipleOf
     * @covers Epfremmer\SwaggerBundle\Entity\Mixin\Primitives\NumericPrimitiveTrait::setMultipleOf
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
     * @covers Epfremmer\SwaggerBundle\Entity\Mixin\Primitives\NumericPrimitiveTrait::getMaximum
     * @covers Epfremmer\SwaggerBundle\Entity\Mixin\Primitives\NumericPrimitiveTrait::setMaximum
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
     * @covers Epfremmer\SwaggerBundle\Entity\Mixin\Primitives\NumericPrimitiveTrait::getExclusiveMaximum
     * @covers Epfremmer\SwaggerBundle\Entity\Mixin\Primitives\NumericPrimitiveTrait::setExclusiveMaximum
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
