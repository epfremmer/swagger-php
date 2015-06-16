<?php
/**
 * File IntegerHeaderTest.php
 *
 * @author Edward Pfremmer <epfremme@nerdery.com>
 */
namespace Epfremmer\SwaggerBundle\Tests\Entity\Headers;

use Epfremmer\SwaggerBundle\Entity\Headers\AbstractHeader;
use Epfremmer\SwaggerBundle\Entity\Headers\IntegerHeader;
use Epfremmer\SwaggerBundle\Tests\Mixin\SerializerContextTrait;

/**
 * Class IntegerHeaderTest
 *
 * @package Epfremmer\SwaggerBundle
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
     * @covers Epfremmer\SwaggerBundle\Entity\Headers\IntegerHeader::getType
     */
    public function testType()
    {
        $this->assertNotEmpty($this->integerHeader->getType());
        $this->assertEquals(IntegerHeader::INTEGER_TYPE, $this->integerHeader->getType());
    }

    /**
     * @covers Epfremmer\SwaggerBundle\Entity\Headers\IntegerHeader
     */
    public function testSerialization()
    {
        $data = json_encode([
            'type' => IntegerHeader::INTEGER_TYPE,
            'format'           => 'foo',
            'description'      => 'bar',
            'default'          => 'baz',
        ]);

        $schema = self::$serializer->deserialize($data, AbstractHeader::class, 'json');

        $this->assertInstanceOf(IntegerHeader::class, $schema);
        $this->assertAttributeEquals('foo', 'format', $schema);
        $this->assertAttributeEquals('bar', 'description', $schema);
        $this->assertAttributeEquals('baz', 'default', $schema);

        $json = self::$serializer->serialize($schema, 'json');

        $this->assertJson($json);
        $this->assertJsonStringEqualsJsonString($data, $json);
    }
}
