<?php
/**
 * File IntegerHeaderTest.php
 *
 * @author Edward Pfremmer <epfremme@nerdery.com>
 */
namespace Nerdery\Swagger\Tests\Entity\Headers;

use Nerdery\Swagger\Entity\Headers\AbstractHeader;
use Nerdery\Swagger\Entity\Headers\IntegerHeader;
use Nerdery\Swagger\Tests\Mixin\SerializerContextTrait;

/**
 * Class IntegerHeaderTest
 *
 * @package Nerdery\Swagger
 * @subpackage Tests\Entity\Headers
 */
class IntegerHeaderTest extends \PHPUnit_Framework_TestCase
{
    use SerializerContextTrait;

    /**
     * @var IntegerHeader
     */
    protected $integerHeader;

    /**
     * {@inheritdoc}
     */
    protected function setUp()
    {
        $this->integerHeader = new IntegerHeader();
    }

    /**
     * @covers Nerdery\Swagger\Entity\Headers\IntegerHeader::getType
     */
    public function testType()
    {
        $this->assertNotEmpty($this->integerHeader->getType());
        $this->assertEquals(IntegerHeader::INTEGER_TYPE, $this->integerHeader->getType());
    }

    /**
     * @covers Nerdery\Swagger\Entity\Headers\IntegerHeader
     */
    public function testSerialization()
    {
        $data = json_encode([
            'type' => IntegerHeader::INTEGER_TYPE,
            'format'           => 'foo',
            'description'      => 'bar',
            'default'          => 'baz',
        ]);

        $schema = $this->getSerializer()->deserialize($data, AbstractHeader::class, 'json');

        $this->assertInstanceOf(IntegerHeader::class, $schema);
        $this->assertAttributeEquals('foo', 'format', $schema);
        $this->assertAttributeEquals('bar', 'description', $schema);
        $this->assertAttributeEquals('baz', 'default', $schema);

        $json = $this->getSerializer()->serialize($schema, 'json');

        $this->assertJson($json);
        $this->assertJsonStringEqualsJsonString($data, $json);
    }
}
