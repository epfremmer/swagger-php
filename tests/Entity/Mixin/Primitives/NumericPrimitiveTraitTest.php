<?php
/**
 * File NumericPrimitiveTraitTest.php
 *
 * @author Edward Pfremmer <epfremme@nerdery.com>
 */
namespace Epfremme\Swagger\Tests\Entity\Mixin;

use Epfremme\Swagger\Entity\Mixin\Primitives\NumericPrimitiveTrait;
use Epfremme\Swagger\Entity\Schemas\AbstractSchema;
use Epfremme\Swagger\Entity\Schemas\NumberSchema;
use Epfremme\Swagger\Tests\Mixin\SerializerContextTrait;

/**
 * Class NumericPrimitiveTraitTest
 *
 * @package Epfremme\Swagger
 * @subpackage Tests\Entity\Schemas\Primitives
 */
class NumericPrimitiveTraitTest extends \PHPUnit_Framework_TestCase
{
    use SerializerContextTrait;

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
     * @covers Epfremme\Swagger\Entity\Mixin\Primitives\NumericPrimitiveTrait::getMultipleOf
     * @covers Epfremme\Swagger\Entity\Mixin\Primitives\NumericPrimitiveTrait::setMultipleOf
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
     * @covers Epfremme\Swagger\Entity\Mixin\Primitives\NumericPrimitiveTrait::getMaximum
     * @covers Epfremme\Swagger\Entity\Mixin\Primitives\NumericPrimitiveTrait::setMaximum
     */
    public function testMaximum()
    {
        $this->assertClassHasAttribute('maximum', $this->mockClass);
        $this->assertInstanceOf($this->mockClass, $this->mockTrait->setMaximum(10.5));
        $this->assertAttributeInternalType('float', 'maximum', $this->mockTrait);
        $this->assertAttributeEquals(10.5, 'maximum', $this->mockTrait);
        $this->assertEquals(10.5, $this->mockTrait->getMaximum());
    }

    /**
     * @covers Epfremme\Swagger\Entity\Mixin\Primitives\NumericPrimitiveTrait::getExclusiveMaximum
     * @covers Epfremme\Swagger\Entity\Mixin\Primitives\NumericPrimitiveTrait::setExclusiveMaximum
     */
    public function testExclusiveMaximum()
    {
        $this->assertClassHasAttribute('exclusiveMaximum', $this->mockClass);
        $this->assertInstanceOf($this->mockClass, $this->mockTrait->setExclusiveMaximum(10.5));
        $this->assertAttributeInternalType('float', 'exclusiveMaximum', $this->mockTrait);
        $this->assertAttributeEquals(10.5, 'exclusiveMaximum', $this->mockTrait);
        $this->assertEquals(10.5, $this->mockTrait->getExclusiveMaximum());
    }

    /**
     * @covers Epfremme\Swagger\Entity\Mixin\Primitives\NumericPrimitiveTrait::getMinimum
     * @covers Epfremme\Swagger\Entity\Mixin\Primitives\NumericPrimitiveTrait::setMinimum
     */
    public function testMinimum()
    {
        $this->assertClassHasAttribute('minimum', $this->mockClass);
        $this->assertInstanceOf($this->mockClass, $this->mockTrait->setMinimum(10.5));
        $this->assertAttributeInternalType('float', 'minimum', $this->mockTrait);
        $this->assertAttributeEquals(10.5, 'minimum', $this->mockTrait);
        $this->assertEquals(10.5, $this->mockTrait->getMinimum());
    }

    /**
     * @covers Epfremme\Swagger\Entity\Mixin\Primitives\NumericPrimitiveTrait::getExclusiveMinimum
     * @covers Epfremme\Swagger\Entity\Mixin\Primitives\NumericPrimitiveTrait::setExclusiveMinimum
     */
    public function testExclusiveMinimum()
    {
        $this->assertClassHasAttribute('exclusiveMinimum', $this->mockClass);
        $this->assertInstanceOf($this->mockClass, $this->mockTrait->setExclusiveMinimum(10.5));
        $this->assertAttributeInternalType('float', 'exclusiveMinimum', $this->mockTrait);
        $this->assertAttributeEquals(10.5, 'exclusiveMinimum', $this->mockTrait);
        $this->assertEquals(10.5, $this->mockTrait->getExclusiveMinimum());
    }

    /**
     * @covers Epfremme\Swagger\Entity\Mixin\Primitives\NumericPrimitiveTrait
     */
    public function testSerialization()
    {
        $data = json_encode([
            'type' => AbstractSchema::NUMBER_TYPE,
            'multipleOf'       => 1,
            'maximum'          => 125.5,
            'exclusiveMaximum' => 125,
            'minimum'          => 10.5,
            'exclusiveMinimum' => 10,
        ]);

        $primitive = $this->getSerializer()->deserialize($data, AbstractSchema::class, 'json');

        $this->assertInstanceOf(NumberSchema::class, $primitive);
        $this->assertAttributeEquals(1, 'multipleOf', $primitive);
        $this->assertAttributeEquals(125.5, 'maximum', $primitive);
        $this->assertAttributeEquals(125, 'exclusiveMaximum', $primitive);
        $this->assertAttributeEquals(10.5, 'minimum', $primitive);
        $this->assertAttributeEquals(10, 'exclusiveMinimum', $primitive);

        $json = $this->getSerializer()->serialize($primitive, 'json');

        $this->assertJson($json);
        $this->assertJsonStringEqualsJsonString($data, $json);
    }
}
