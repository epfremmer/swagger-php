<?php
/**
 * File BooleanHeaderTest.php
 *
 * @author Edward Pfremmer <epfremme@nerdery.com>
 */
namespace ERP\Swagger\Tests\Entity\Headers;

use ERP\Swagger\Entity\Headers\AbstractHeader;
use ERP\Swagger\Entity\Headers\BooleanHeader;
use ERP\Swagger\Tests\Mixin\SerializerContextTrait;

/**
 * Class BooleanHeaderTest
 *
 * @package ERP\Swagger
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
     * @covers ERP\Swagger\Entity\Headers\BooleanHeader::getType
     */
    public function testType()
    {
        $this->assertNotEmpty($this->booleanHeader->getType());
        $this->assertEquals(BooleanHeader::BOOLEAN_TYPE, $this->booleanHeader->getType());
    }

    /**
     * @covers ERP\Swagger\Entity\Headers\BooleanHeader
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
