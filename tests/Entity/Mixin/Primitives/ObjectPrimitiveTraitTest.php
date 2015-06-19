<?php
/**
 * File ObjectPrimitiveTraitTest.php
 *
 * @author Edward Pfremmer <epfremme@nerdery.com>
 */
namespace ERP\Swagger\Tests\Entity\Mixin;

use Doctrine\Common\Collections\ArrayCollection;
use ERP\Swagger\Entity\Schemas\AbstractSchema;
use ERP\Swagger\Entity\Schemas\ObjectSchema;
use ERP\Swagger\Entity\Mixin\Primitives\ObjectPrimitiveTrait;
use ERP\Swagger\Entity\Schemas\RefSchema;
use ERP\Swagger\Entity\Schemas\SchemaInterface;
use ERP\Swagger\Tests\Mixin\SerializerContextTrait;

/**
 * Class ObjectPrimitiveTraitTest
 *
 * @package ERP\Swagger
 * @subpackage Tests\Entity\Schemas\Primitives
 */
class ObjectPrimitiveTraitTest extends \PHPUnit_Framework_TestCase
{
    use SerializerContextTrait;

    /**
     * @var ObjectPrimitiveTrait|\PHPUnit_Framework_MockObject_MockObject
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
        $this->mockTrait = $this->getMockForTrait(ObjectPrimitiveTrait::class);
        $this->mockClass = get_class($this->mockTrait);
    }

    /**
     * @covers ERP\Swagger\Entity\Mixin\Primitives\ObjectPrimitiveTrait::getMaxProperties
     * @covers ERP\Swagger\Entity\Mixin\Primitives\ObjectPrimitiveTrait::setMaxProperties
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
     * @covers ERP\Swagger\Entity\Mixin\Primitives\ObjectPrimitiveTrait::getMinProperties
     * @covers ERP\Swagger\Entity\Mixin\Primitives\ObjectPrimitiveTrait::setMinProperties
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
     * @covers ERP\Swagger\Entity\Mixin\Primitives\ObjectPrimitiveTrait::getRequired
     * @covers ERP\Swagger\Entity\Mixin\Primitives\ObjectPrimitiveTrait::setRequired
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
     * @covers ERP\Swagger\Entity\Mixin\Primitives\ObjectPrimitiveTrait::getProperties
     * @covers ERP\Swagger\Entity\Mixin\Primitives\ObjectPrimitiveTrait::setProperties
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
     * @covers ERP\Swagger\Entity\Mixin\Primitives\ObjectPrimitiveTrait::isAdditionalProperties
     * @covers ERP\Swagger\Entity\Mixin\Primitives\ObjectPrimitiveTrait::setAdditionalProperties
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
     * @covers ERP\Swagger\Entity\Mixin\Primitives\ObjectPrimitiveTrait::getPatternProperties
     * @covers ERP\Swagger\Entity\Mixin\Primitives\ObjectPrimitiveTrait::setPatternProperties
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
     * @covers ERP\Swagger\Entity\Mixin\Primitives\ObjectPrimitiveTrait::getDependencies
     * @covers ERP\Swagger\Entity\Mixin\Primitives\ObjectPrimitiveTrait::setDependencies
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

    /**
     * @covers ERP\Swagger\Entity\Mixin\Primitives\ObjectPrimitiveTrait
     */
    public function testSerialization()
    {
        $data = json_encode([
            'type' => AbstractSchema::OBJECT_TYPE,
            'maxProperties'        => 10,
            'minProperties'        => 1,
            'required'             => ['foo', 'bar'],
            'properties'           => [
                'foo' => [
                    'type' => AbstractSchema::STRING_TYPE
                ],
                'bar' => [
                    '$ref' => RefSchema::REF_TYPE
                ],
                'baz' => [
                    'type' => AbstractSchema::NUMBER_TYPE
                ],
            ],
            'additionalProperties' => true,
            'patternProperties'    => 'foo',
            'dependencies'         => ['foo', 'bar', 'baz'],
        ]);

        $primitive = $this->getSerializer()->deserialize($data, AbstractSchema::class, 'json');

        $this->assertInstanceOf(ObjectSchema::class, $primitive);
        $this->assertAttributeEquals(10, 'maxProperties', $primitive);
        $this->assertAttributeEquals(1, 'minProperties', $primitive);
        $this->assertAttributeEquals(['foo', 'bar'], 'required', $primitive);
        $this->assertAttributeInstanceOf(ArrayCollection::class, 'properties', $primitive);
        $this->assertContainsOnlyInstancesOf(SchemaInterface::class, $primitive->getProperties());
        $this->assertAttributeEquals(true, 'additionalProperties', $primitive);
        $this->assertAttributeEquals('foo', 'patternProperties', $primitive);
        $this->assertAttributeEquals(['foo', 'bar', 'baz'], 'dependencies', $primitive);

        $json = $this->getSerializer()->serialize($primitive, 'json');

        $this->assertJson($json);
        $this->assertJsonStringEqualsJsonString($data, $json);
    }
}
