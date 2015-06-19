<?php
/**
 * File StringHeaderTest.php
 *
 * @author Edward Pfremmer <epfremme@nerdery.com>
 */
namespace ERP\Swagger\Tests\Entity\Headers;

use ERP\Swagger\Entity\Headers\AbstractHeader;
use ERP\Swagger\Entity\Headers\StringHeader;
use ERP\Swagger\Tests\Mixin\SerializerContextTrait;

/**
 * Class StringHeaderTest
 *
 * @package ERP\Swagger
 * @subpackage Tests\Entity\Headers
 */
class StringHeaderTest extends \PHPUnit_Framework_TestCase
{
    use SerializerContextTrait;

    /**
     * @var StringHeader
     */
    protected $stringHeader;

    /**
     * {@inheritdoc}
     */
    protected function setUp()
    {
        $this->stringHeader = new StringHeader();
    }

    /**
     * @covers ERP\Swagger\Entity\Headers\StringHeader::getType
     */
    public function testType()
    {
        $this->assertNotEmpty($this->stringHeader->getType());
        $this->assertEquals(StringHeader::STRING_TYPE, $this->stringHeader->getType());
    }

    /**
     * @covers ERP\Swagger\Entity\Headers\StringHeader
     */
    public function testSerialization()
    {
        $data = json_encode([
            'type' => StringHeader::STRING_TYPE,
            'format'           => 'foo',
            'description'      => 'bar',
            'default'          => 'baz',
        ]);

        $schema = $this->getSerializer()->deserialize($data, AbstractHeader::class, 'json');

        $this->assertInstanceOf(StringHeader::class, $schema);
        $this->assertAttributeEquals('foo', 'format', $schema);
        $this->assertAttributeEquals('bar', 'description', $schema);
        $this->assertAttributeEquals('baz', 'default', $schema);

        $json = $this->getSerializer()->serialize($schema, 'json');

        $this->assertJson($json);
        $this->assertJsonStringEqualsJsonString($data, $json);
    }
}
