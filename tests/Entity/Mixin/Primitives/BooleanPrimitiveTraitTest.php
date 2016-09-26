<?php
/**
 * File BooleanPrimitiveTraitTest.php
 *
 * @author Edward Pfremmer <epfremme@nerdery.com>
 */
namespace Epfremme\Swagger\Tests\Entity\Mixin;

use Epfremme\Swagger\Entity\Mixin\Primitives\BooleanPrimitiveTrait;
use Epfremme\Swagger\Entity\Schemas\AbstractSchema;
use Epfremme\Swagger\Entity\Schemas\BooleanSchema;
use Epfremme\Swagger\Tests\Mixin\SerializerContextTrait;

/**
 * Class BooleanPrimitiveTraitTest
 *
 * @package Epfremme\Swagger
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
     * @covers Epfremme\Swagger\Entity\Mixin\Primitives\BooleanPrimitiveTrait
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
