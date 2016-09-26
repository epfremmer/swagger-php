<?php
/**
 * File NumberHeaderTest.php
 *
 * @author Edward Pfremmer <epfremme@nerdery.com>
 */
namespace Epfremme\Swagger\Tests\Entity\Headers;

use Epfremme\Swagger\Entity\Headers\AbstractHeader;
use Epfremme\Swagger\Entity\Headers\NumberHeader;
use Epfremme\Swagger\Tests\Mixin\SerializerContextTrait;

/**
 * Class NumberHeaderTest
 *
 * @package Epfremme\Swagger
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
     * @covers Epfremme\Swagger\Entity\Headers\NumberHeader::getType
     */
    public function testType()
    {
        $this->assertNotEmpty($this->numberHeader->getType());
        $this->assertEquals(NumberHeader::NUMBER_TYPE, $this->numberHeader->getType());
    }

    /**
     * @covers Epfremme\Swagger\Entity\Headers\NumberHeader
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
