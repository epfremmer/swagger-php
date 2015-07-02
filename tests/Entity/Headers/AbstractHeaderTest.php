<?php
/**
 * File AbstractHeaderTest.php
 *
 * @author Edward Pfremmer <epfremme@nerdery.com>
 */
namespace Nerdery\Swagger\Tests\Entity\Headers;

use Nerdery\Swagger\Entity\Headers\AbstractHeader;

/**
 * Class AbstractHeaderTest
 *
 * @package Nerdery\Swagger
 * @subpackage Tests\Entity\Headers
 */
class AbstractHeaderTest extends \PHPUnit_Framework_TestCase
{

    /**
     * @var AbstractHeader|\PHPUnit_Framework_MockObject_MockObject
     */
    protected $mockHeader;

    /**
     * {@inheritdoc}
     */
    protected function setUp()
    {
        $this->mockHeader = $this->getMockForAbstractClass(AbstractHeader::class);
    }

    /**
     * @covers Nerdery\Swagger\Entity\Headers\AbstractHeader::getDescription
     * @covers Nerdery\Swagger\Entity\Headers\AbstractHeader::setDescription
     */
    public function testDescription()
    {
        $this->assertClassHasAttribute('description', AbstractHeader::class);
        $this->assertInstanceOf(AbstractHeader::class, $this->mockHeader->setDescription('foo'));
        $this->assertAttributeEquals('foo', 'description', $this->mockHeader);
        $this->assertEquals('foo', $this->mockHeader->getDescription());
    }

    /**
     * @covers Nerdery\Swagger\Entity\Headers\AbstractHeader::getFormat
     * @covers Nerdery\Swagger\Entity\Headers\AbstractHeader::setFormat
     */
    public function testFormat()
    {
        $this->assertClassHasAttribute('format', AbstractHeader::class);
        $this->assertInstanceOf(AbstractHeader::class, $this->mockHeader->setFormat('foo'));
        $this->assertAttributeEquals('foo', 'format', $this->mockHeader);
        $this->assertEquals('foo', $this->mockHeader->getFormat());
    }

    /**
     * @covers Nerdery\Swagger\Entity\Headers\AbstractHeader::getDefault
     * @covers Nerdery\Swagger\Entity\Headers\AbstractHeader::setDefault
     */
    public function testDefault()
    {
        $this->assertClassHasAttribute('default', AbstractHeader::class);
        $this->assertInstanceOf(AbstractHeader::class, $this->mockHeader->setDefault('foo'));
        $this->assertAttributeEquals('foo', 'default', $this->mockHeader);
        $this->assertEquals('foo', $this->mockHeader->getDefault());
    }
}
