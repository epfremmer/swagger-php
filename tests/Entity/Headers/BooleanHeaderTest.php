<?php
/**
 * File BooleanHeaderTest.php
 *
 * @author Edward Pfremmer <epfremme@nerdery.com>
 */
namespace Nerdery\Swagger\Tests\Entity\Headers;

use Nerdery\Swagger\Entity\Headers\AbstractHeader;
use Nerdery\Swagger\Entity\Headers\BooleanHeader;
use Nerdery\Swagger\Tests\Mixin\SerializerContextTrait;

/**
 * Class BooleanHeaderTest
 *
 * @package Nerdery\Swagger
 * @subpackage Tests\Entity\Headers
 */
class BooleanHeaderTest extends \PHPUnit_Framework_TestCase
{
    use SerializerContextTrait;

    /**
     * @var BooleanHeader
     */
    protected $booleanHeader;

    /**
     * {@inheritdoc}
     */
    protected function setUp()
    {
        $this->booleanHeader = new BooleanHeader();
    }

    /**
     * @covers Nerdery\Swagger\Entity\Headers\BooleanHeader::getType
     */
    public function testType()
    {
        $this->assertNotEmpty($this->booleanHeader->getType());
        $this->assertEquals(BooleanHeader::BOOLEAN_TYPE, $this->booleanHeader->getType());
    }

    /**
     * @covers Nerdery\Swagger\Entity\Headers\BooleanHeader
     */
    public function testSerialization()
    {
        $data = json_encode([
            'type' => BooleanHeader::BOOLEAN_TYPE,
            'format'           => 'foo',
            'description'      => 'bar',
            'default'          => 'baz',
        ]);

        $schema = $this->getSerializer()->deserialize($data, AbstractHeader::class, 'json');

        $this->assertInstanceOf(BooleanHeader::class, $schema);
        $this->assertAttributeEquals('foo', 'format', $schema);
        $this->assertAttributeEquals('bar', 'description', $schema);
        $this->assertAttributeEquals('baz', 'default', $schema);

        $json = $this->getSerializer()->serialize($schema, 'json');

        $this->assertJson($json);
        $this->assertJsonStringEqualsJsonString($data, $json);
    }
}
