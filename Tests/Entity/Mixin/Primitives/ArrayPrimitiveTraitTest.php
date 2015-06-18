<?php
/**
 * File ArrayPrimitiveTraitTest.php
 *
 * @author Edward Pfremmer <epfremme@nerdery.com>
 */
namespace Epfremmer\SwaggerBundle\Tests\Entity\Mixin;

use Epfremmer\SwaggerBundle\Entity\Mixin\Primitives\ArrayPrimitiveTrait;
use Epfremmer\SwaggerBundle\Entity\Schemas\AbstractSchema;
use Epfremmer\SwaggerBundle\Entity\Schemas\ArraySchema;
use Epfremmer\SwaggerBundle\Entity\Schemas\RefSchema;
use Epfremmer\SwaggerBundle\Tests\Mixin\SerializerContextTrait;

/**
 * Class ArrayPrimitiveTraitTest
 *
 * @package Epfremmer\SwaggerBundle
 * @subpackage Tests\Entity\Schemas\Primitives
 */
class ArrayPrimitiveTraitTest extends \PHPUnit_Framework_TestCase
{
    use SerializerContextTrait;

    /**
     * @var ArrayPrimitiveTrait|\PHPUnit_Framework_MockObject_MockObject
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
        $this->mockTrait = $this->getMockForTrait(ArrayPrimitiveTrait::class);
        $this->mockClass = get_class($this->mockTrait);
    }

    /**
     * @covers Epfremmer\SwaggerBundle\Entity\Mixin\Primitives\ArrayPrimitiveTrait::getItems
     * @covers Epfremmer\SwaggerBundle\Entity\Mixin\Primitives\ArrayPrimitiveTrait::setItems
     */
    public function testItems()
    {
        $items = new RefSchema();

        $this->assertClassHasAttribute('items', $this->mockClass);
        $this->assertInstanceOf($this->mockClass, $this->mockTrait->setItems($items));
        $this->assertAttributeInstanceOf(RefSchema::class, 'items', $this->mockTrait);
        $this->assertAttributeEquals($items, 'items', $this->mockTrait);
        $this->assertEquals($items, $this->mockTrait->getItems());
    }

    /**
     * @covers Epfremmer\SwaggerBundle\Entity\Mixin\Primitives\ArrayPrimitiveTrait::isAdditionalItems
     * @covers Epfremmer\SwaggerBundle\Entity\Mixin\Primitives\ArrayPrimitiveTrait::setAdditionalItems
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
     * @covers Epfremmer\SwaggerBundle\Entity\Mixin\Primitives\ArrayPrimitiveTrait::getMaxItems
     * @covers Epfremmer\SwaggerBundle\Entity\Mixin\Primitives\ArrayPrimitiveTrait::setMaxItems
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
     * @covers Epfremmer\SwaggerBundle\Entity\Mixin\Primitives\ArrayPrimitiveTrait::getMinItems
     * @covers Epfremmer\SwaggerBundle\Entity\Mixin\Primitives\ArrayPrimitiveTrait::setMinItems
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
     * @covers Epfremmer\SwaggerBundle\Entity\Mixin\Primitives\ArrayPrimitiveTrait::isUniqueItems
     * @covers Epfremmer\SwaggerBundle\Entity\Mixin\Primitives\ArrayPrimitiveTrait::setUniqueItems
     */
    public function testUniqueItems()
    {
        $this->assertClassHasAttribute('uniqueItems', $this->mockClass);
        $this->assertInstanceOf($this->mockClass, $this->mockTrait->setUniqueItems(true));
        $this->assertAttributeInternalType('boolean', 'uniqueItems', $this->mockTrait);
        $this->assertAttributeEquals(true, 'uniqueItems', $this->mockTrait);
        $this->assertTrue($this->mockTrait->isUniqueItems());
    }

    /**
     * @covers Epfremmer\SwaggerBundle\Entity\Mixin\Primitives\ArrayPrimitiveTrait
     */
    public function testSerialization()
    {
        $data = json_encode([
            'type'  => AbstractSchema::ARRAY_TYPE,
            'items' => [
                '$ref' => '#/definitions/foo'
            ],
            'additionalItems'  => false,
            'maxItems'         => 10,
            'minItems'         => 1,
            'uniqueItems'      => true,
            'collectionFormat' => 'csv',
        ]);

        $primitive = $this->getSerializer()->deserialize($data, AbstractSchema::class, 'json');

        $this->assertInstanceOf(ArraySchema::class, $primitive);
        $this->assertAttributeInstanceOf(RefSchema::class, 'items', $primitive);
        $this->assertAttributeEquals(false, 'additionalItems', $primitive);
        $this->assertAttributeEquals(10, 'maxItems', $primitive);
        $this->assertAttributeEquals(1, 'minItems', $primitive);
        $this->assertAttributeEquals(true, 'uniqueItems', $primitive);
        $this->assertAttributeEquals('csv', 'collectionFormat', $primitive);

        $json = $this->getSerializer()->serialize($primitive, 'json');

        $this->assertJson($json);
        $this->assertJsonStringEqualsJsonString($data, $json);
    }
}
