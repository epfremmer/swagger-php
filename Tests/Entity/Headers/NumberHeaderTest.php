<?php
/**
 * File NumberHeaderTest.php
 *
 * @author Edward Pfremmer <epfremme@nerdery.com>
 */
namespace Epfremmer\SwaggerBundle\Tests\Entity\Headers;

use Epfremmer\SwaggerBundle\Entity\Headers\AbstractHeader;
use Epfremmer\SwaggerBundle\Entity\Headers\NumberHeader;
use Epfremmer\SwaggerBundle\Tests\Mixin\SerializerContextTrait;

/**
 * Class NumberHeaderTest
 *
 * @package Epfremmer\SwaggerBundle
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
     * @covers Epfremmer\SwaggerBundle\Entity\Headers\NumberHeader::getType
     */
    public function testType()
    {
        $this->assertNotEmpty($this->numberHeader->getType());
        $this->assertEquals(NumberHeader::NUMBER_TYPE, $this->numberHeader->getType());
    }

    /**
     * @covers Epfremmer\SwaggerBundle\Entity\Headers\NumberHeader
     */
    public function testSerialization()
    {
        $data = json_encode([
            'type' => NumberHeader::NUMBER_TYPE,
            'format'           => 'foo',
            'description'      => 'bar',
            'default'          => 'baz',
        ]);

        $schema = self::$serializer->deserialize($data, AbstractHeader::class, 'json');

        $this->assertInstanceOf(NumberHeader::class, $schema);
        $this->assertAttributeEquals('foo', 'format', $schema);
        $this->assertAttributeEquals('bar', 'description', $schema);
        $this->assertAttributeEquals('baz', 'default', $schema);

        $json = self::$serializer->serialize($schema, 'json');

        $this->assertJson($json);
        $this->assertJsonStringEqualsJsonString($data, $json);
    }
}
