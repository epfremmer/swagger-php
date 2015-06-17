<?php
/**
 * File BooleanHeaderTest.php
 *
 * @author Edward Pfremmer <epfremme@nerdery.com>
 */
namespace Epfremmer\SwaggerBundle\Tests\Entity\Headers;

use Epfremmer\SwaggerBundle\Entity\Headers\AbstractHeader;
use Epfremmer\SwaggerBundle\Entity\Headers\BooleanHeader;
use Epfremmer\SwaggerBundle\Tests\Mixin\SerializerContextTrait;

/**
 * Class BooleanHeaderTest
 *
 * @package Epfremmer\SwaggerBundle
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
     * @covers Epfremmer\SwaggerBundle\Entity\Headers\BooleanHeader::getType
     */
    public function testType()
    {
        $this->assertNotEmpty($this->booleanHeader->getType());
        $this->assertEquals(BooleanHeader::BOOLEAN_TYPE, $this->booleanHeader->getType());
    }

    /**
     * @covers Epfremmer\SwaggerBundle\Entity\Headers\BooleanHeader
     */
    public function testSerialization()
    {
        $data = json_encode([
            'type' => BooleanHeader::BOOLEAN_TYPE,
            'format'           => 'foo',
            'description'      => 'bar',
            'default'          => 'baz',
        ]);

        $schema = self::$serializer->deserialize($data, AbstractHeader::class, 'json');

        $this->assertInstanceOf(BooleanHeader::class, $schema);
        $this->assertAttributeEquals('foo', 'format', $schema);
        $this->assertAttributeEquals('bar', 'description', $schema);
        $this->assertAttributeEquals('baz', 'default', $schema);

        $json = self::$serializer->serialize($schema, 'json');

        $this->assertJson($json);
        $this->assertJsonStringEqualsJsonString($data, $json);
    }
}
