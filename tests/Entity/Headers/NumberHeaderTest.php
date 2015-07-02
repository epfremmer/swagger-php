<?php
/**
 * File NumberHeaderTest.php
 *
 * @author Edward Pfremmer <epfremme@nerdery.com>
 */
namespace Nerdery\Swagger\Tests\Entity\Headers;

use Nerdery\Swagger\Entity\Headers\AbstractHeader;
use Nerdery\Swagger\Entity\Headers\NumberHeader;
use Nerdery\Swagger\Tests\Mixin\SerializerContextTrait;

/**
 * Class NumberHeaderTest
 *
 * @package Nerdery\Swagger
 * @subpackage Tests\Entity\Headers
 */
class NumberHeaderTest extends \PHPUnit_Framework_TestCase
{
    use SerializerContextTrait;

    /**
     * @var NumberHeader
     */
    protected $numberHeader;

    /**
     * {@inheritdoc}
     */
    protected function setUp()
    {
        $this->numberHeader = new NumberHeader();
    }

    /**
     * @covers Nerdery\Swagger\Entity\Headers\NumberHeader::getType
     */
    public function testType()
    {
        $this->assertNotEmpty($this->numberHeader->getType());
        $this->assertEquals(NumberHeader::NUMBER_TYPE, $this->numberHeader->getType());
    }

    /**
     * @covers Nerdery\Swagger\Entity\Headers\NumberHeader
     */
    public function testSerialization()
    {
        $data = json_encode([
            'type' => NumberHeader::NUMBER_TYPE,
            'format'           => 'foo',
            'description'      => 'bar',
            'default'          => 'baz',
        ]);

        $schema = $this->getSerializer()->deserialize($data, AbstractHeader::class, 'json');

        $this->assertInstanceOf(NumberHeader::class, $schema);
        $this->assertAttributeEquals('foo', 'format', $schema);
        $this->assertAttributeEquals('bar', 'description', $schema);
        $this->assertAttributeEquals('baz', 'default', $schema);

        $json = $this->getSerializer()->serialize($schema, 'json');

        $this->assertJson($json);
        $this->assertJsonStringEqualsJsonString($data, $json);
    }
}
