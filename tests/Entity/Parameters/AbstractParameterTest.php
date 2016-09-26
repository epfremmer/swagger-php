<?php
/**
 * File AbstractParameterTest.php
 *
 * @author Edward Pfremmer <epfremme@nerdery.com>
 */
namespace Epfremme\Swagger\Tests\Entity\Parameters;

use Epfremme\Swagger\Entity\Parameters\AbstractParameter;
use Epfremme\Swagger\Entity\Schemas\ObjectSchema;

/**
 * Class AbstractParameterTest
 *
 * @package Epfremme\Swagger
 * @subpackage Tests\Entity\Parameters
 */
class AbstractParameterTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var AbstractParameter|\PHPUnit_Framework_MockObject_MockObject
     */
    protected $mockParameter;

    /**
     * {@inheritdoc}
     */
    protected function setUp()
    {
        $this->mockParameter = $this->getMockForAbstractClass(AbstractParameter::class);
    }

    /**
     * @covers Epfremme\Swagger\Entity\Parameters\AbstractParameter::getIn
     * @covers Epfremme\Swagger\Entity\Parameters\AbstractParameter::setIn
     */
    public function testIn()
    {
        $this->assertClassHasAttribute('in', AbstractParameter::class);
        $this->assertInstanceOf(AbstractParameter::class, $this->mockParameter->setIn('foo'));
        $this->assertAttributeEquals('foo', 'in', $this->mockParameter);
        $this->assertEquals('foo', $this->mockParameter->getIn());
    }

    /**
     * @covers Epfremme\Swagger\Entity\Parameters\AbstractParameter::getName
     * @covers Epfremme\Swagger\Entity\Parameters\AbstractParameter::setName
     */
    public function testName()
    {
        $this->assertClassHasAttribute('name', AbstractParameter::class);
        $this->assertInstanceOf(AbstractParameter::class, $this->mockParameter->setName('foo'));
        $this->assertAttributeEquals('foo', 'name', $this->mockParameter);
        $this->assertEquals('foo', $this->mockParameter->getName());
    }

    /**
     * @covers Epfremme\Swagger\Entity\Parameters\AbstractParameter::getDescription
     * @covers Epfremme\Swagger\Entity\Parameters\AbstractParameter::setDescription
     */
    public function testDescription()
    {
        $this->assertClassHasAttribute('description', AbstractParameter::class);
        $this->assertInstanceOf(AbstractParameter::class, $this->mockParameter->setDescription('foo'));
        $this->assertAttributeEquals('foo', 'description', $this->mockParameter);
        $this->assertEquals('foo', $this->mockParameter->getDescription());
    }

    /**
     * @covers Epfremme\Swagger\Entity\Parameters\AbstractParameter::isRequired
     * @covers Epfremme\Swagger\Entity\Parameters\AbstractParameter::setRequired
     */
    public function testRequired()
    {
        $this->assertClassHasAttribute('required', AbstractParameter::class);
        $this->assertInstanceOf(AbstractParameter::class, $this->mockParameter->setRequired(true));
        $this->assertAttributeEquals(true, 'required', $this->mockParameter);
        $this->assertTrue($this->mockParameter->isRequired());
    }
}
