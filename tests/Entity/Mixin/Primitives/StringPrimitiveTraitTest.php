<?php
/**
 * File StringPrimitiveTraitTest.php
 *
 * @author Edward Pfremmer <epfremme@nerdery.com>
 */
namespace Nerdery\Swagger\Tests\Entity\Mixin;

use Nerdery\Swagger\Entity\Mixin\Primitives\StringPrimitiveTrait;
use Nerdery\Swagger\Entity\Schemas\AbstractSchema;
use Nerdery\Swagger\Entity\Schemas\StringSchema;
use Nerdery\Swagger\Tests\Mixin\SerializerContextTrait;

/**
 * Class StringPrimitiveTraitTest
 *
 * @package Nerdery\Swagger
 * @subpackage Tests\Entity\Schemas\Primitives
 */
class StringPrimitiveTraitTest extends \PHPUnit_Framework_TestCase
{
    use SerializerContextTrait;

    /**
     * @var StringPrimitiveTrait|\PHPUnit_Framework_MockObject_MockObject
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
        $this->mockTrait = $this->getMockForTrait(StringPrimitiveTrait::class);
        $this->mockClass = get_class($this->mockTrait);
    }

    /**
     * @covers Nerdery\Swagger\Entity\Mixin\Primitives\StringPrimitiveTrait::getMaxLength
     * @covers Nerdery\Swagger\Entity\Mixin\Primitives\StringPrimitiveTrait::setMaxLength
     */
    public function testMaxLength()
    {
        $this->assertClassHasAttribute('maxLength', $this->mockClass);
        $this->assertInstanceOf($this->mockClass, $this->mockTrait->setMaxLength(5));
        $this->assertAttributeInternalType('integer', 'maxLength', $this->mockTrait);
        $this->assertAttributeEquals(5, 'maxLength', $this->mockTrait);
        $this->assertEquals(5, $this->mockTrait->getMaxLength());
    }

    /**
     * @covers Nerdery\Swagger\Entity\Mixin\Primitives\StringPrimitiveTrait::getMinLength
     * @covers Nerdery\Swagger\Entity\Mixin\Primitives\StringPrimitiveTrait::setMinLength
     */
    public function testMinLength()
    {
        $this->assertClassHasAttribute('minLength', $this->mockClass);
        $this->assertInstanceOf($this->mockClass, $this->mockTrait->setMinLength(2));
        $this->assertAttributeInternalType('integer', 'minLength', $this->mockTrait);
        $this->assertAttributeEquals(2, 'minLength', $this->mockTrait);
        $this->assertEquals(2, $this->mockTrait->getMinLength());
    }

    /**
     * @covers Nerdery\Swagger\Entity\Mixin\Primitives\StringPrimitiveTrait::getPattern
     * @covers Nerdery\Swagger\Entity\Mixin\Primitives\StringPrimitiveTrait::setPattern
     */
    public function testPattern()
    {
        $this->assertClassHasAttribute('pattern', $this->mockClass);
        $this->assertInstanceOf($this->mockClass, $this->mockTrait->setPattern('foo'));
        $this->assertAttributeInternalType('string', 'pattern', $this->mockTrait);
        $this->assertAttributeEquals('foo', 'pattern', $this->mockTrait);
        $this->assertEquals('foo', $this->mockTrait->getPattern());
    }

    /**
     * @covers Nerdery\Swagger\Entity\Mixin\Primitives\StringPrimitiveTrait
     */
    public function testSerialization()
    {
        $data = json_encode([
            'type' => AbstractSchema::STRING_TYPE,
            'maxLength' => 10,
            'minLength' => 1,
            'pattern'   => 'foo',
        ]);

        $primitive = $this->getSerializer()->deserialize($data, AbstractSchema::class, 'json');

        $this->assertInstanceOf(StringSchema::class, $primitive);
        $this->assertAttributeEquals(10, 'maxLength', $primitive);
        $this->assertAttributeEquals(1, 'minLength', $primitive);
        $this->assertAttributeEquals('foo', 'pattern', $primitive);

        $json = $this->getSerializer()->serialize($primitive, 'json');

        $this->assertJson($json);
        $this->assertJsonStringEqualsJsonString($data, $json);
    }
}
