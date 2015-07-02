<?php
/**
 * File BooleanPrimitiveTraitTest.php
 *
 * @author Edward Pfremmer <epfremme@nerdery.com>
 */
namespace Nerdery\Swagger\Tests\Entity\Mixin;

use Nerdery\Swagger\Entity\Mixin\Primitives\BooleanPrimitiveTrait;
use Nerdery\Swagger\Entity\Schemas\AbstractSchema;
use Nerdery\Swagger\Entity\Schemas\BooleanSchema;
use Nerdery\Swagger\Tests\Mixin\SerializerContextTrait;

/**
 * Class BooleanPrimitiveTraitTest
 *
 * @package Nerdery\Swagger
 * @subpackage Tests\Entity\Schemas\Primitives
 */
class BooleanPrimitiveTraitTest extends \PHPUnit_Framework_TestCase
{
    use SerializerContextTrait;

    /**
     * @var BooleanPrimitiveTrait|\PHPUnit_Framework_MockObject_MockObject
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
        $this->mockTrait = $this->getMockForTrait(BooleanPrimitiveTrait::class);
        $this->mockClass = get_class($this->mockTrait);
    }

    /**
     * @covers Nerdery\Swagger\Entity\Mixin\Primitives\BooleanPrimitiveTrait
     */
    public function testSerialization()
    {
        $data = json_encode([
            'type' => AbstractSchema::BOOLEAN_TYPE
        ]);

        $primitive = $this->getSerializer()->deserialize($data, AbstractSchema::class, 'json');

        $this->assertInstanceOf(BooleanSchema::class, $primitive);

        $json = $this->getSerializer()->serialize($primitive, 'json');

        $this->assertJson($json);
        $this->assertJsonStringEqualsJsonString($data, $json);
    }
}
