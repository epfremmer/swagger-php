<?php
/**
 * File AbstractHeaderTest.php
 *
 * @author Edward Pfremmer <epfremme@nerdery.com>
 */
namespace Epfremme\Swagger\Tests\Entity\Headers;

use Epfremme\Swagger\Entity\Headers\AbstractHeader;

/**
 * Class AbstractHeaderTest
 *
 * @package Epfremme\Swagger
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
     * @covers Epfremme\Swagger\Entity\Headers\AbstractHeader::getDescription
     * @covers Epfremme\Swagger\Entity\Headers\AbstractHeader::setDescription
     */
    public function testDescription()
    {
        $this->assertClassHasAttribute('description', AbstractHeader::class);
        $this->assertInstanceOf(AbstractHeader::class, $this->mockHeader->setDescription('foo'));
        $this->assertAttributeEquals('foo', 'description', $this->mockHeader);
        $this->assertEquals('foo', $this->mockHeader->getDescription());
    }

    /**
     * @covers Epfremme\Swagger\Entity\Headers\AbstractHeader::getFormat
     * @covers Epfremme\Swagger\Entity\Headers\AbstractHeader::setFormat
     */
    public function testFormat()
    {
        $this->assertClassHasAttribute('format', AbstractHeader::class);
        $this->assertInstanceOf(AbstractHeader::class, $this->mockHeader->setFormat('foo'));
        $this->assertAttributeEquals('foo', 'format', $this->mockHeader);
        $this->assertEquals('foo', $this->mockHeader->getFormat());
    }

    /**
     * @covers Epfremme\Swagger\Entity\Headers\AbstractHeader::getDefault
     * @covers Epfremme\Swagger\Entity\Headers\AbstractHeader::setDefault
     */
    public function testDefault()
    {
        $this->assertClassHasAttribute('default', AbstractHeader::class);
        $this->assertInstanceOf(AbstractHeader::class, $this->mockHeader->setDefault('foo'));
        $this->assertAttributeEquals('foo', 'default', $this->mockHeader);
        $this->assertEquals('foo', $this->mockHeader->getDefault());
    }
}
