<?php
/**
 * File AbstractParameterTest.php
 *
 * @author Edward Pfremmer <epfremme@nerdery.com>
 */
namespace Epfremmer\SwaggerBundle\Tests\Entity\Parameters;

use Epfremmer\SwaggerBundle\Entity\Parameters\AbstractParameter;
use Epfremmer\SwaggerBundle\Entity\Schemas\ObjectSchema;

/**
 * Class AbstractParameterTest
 *
 * @package Epfremmer\SwaggerBundle
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
     * @covers Epfremmer\SwaggerBundle\Entity\Parameters\AbstractParameter::getIn
     * @covers Epfremmer\SwaggerBundle\Entity\Parameters\AbstractParameter::setIn
     */
    public function testIn()
    {
        $this->assertClassHasAttribute('in', AbstractParameter::class);
        $this->assertInstanceOf(AbstractParameter::class, $this->mockParameter->setIn('foo'));
        $this->assertAttributeEquals('foo', 'in', $this->mockParameter);
        $this->assertEquals('foo', $this->mockParameter->getIn());
    }

    /**
     * @covers Epfremmer\SwaggerBundle\Entity\Parameters\AbstractParameter::getName
     * @covers Epfremmer\SwaggerBundle\Entity\Parameters\AbstractParameter::setName
     */
    public function testName()
    {
        $this->assertClassHasAttribute('name', AbstractParameter::class);
        $this->assertInstanceOf(AbstractParameter::class, $this->mockParameter->setName('foo'));
        $this->assertAttributeEquals('foo', 'name', $this->mockParameter);
        $this->assertEquals('foo', $this->mockParameter->getName());
    }

    /**
     * @covers Epfremmer\SwaggerBundle\Entity\Parameters\AbstractParameter::getDescription
     * @covers Epfremmer\SwaggerBundle\Entity\Parameters\AbstractParameter::setDescription
     */
    public function testDescription()
    {
        $this->assertClassHasAttribute('description', AbstractParameter::class);
        $this->assertInstanceOf(AbstractParameter::class, $this->mockParameter->setDescription('foo'));
        $this->assertAttributeEquals('foo', 'description', $this->mockParameter);
        $this->assertEquals('foo', $this->mockParameter->getDescription());
    }

    /**
     * @covers Epfremmer\SwaggerBundle\Entity\Parameters\AbstractParameter::isRequired
     * @covers Epfremmer\SwaggerBundle\Entity\Parameters\AbstractParameter::setRequired
     */
    public function testRequired()
    {
        $this->assertClassHasAttribute('required', AbstractParameter::class);
        $this->assertInstanceOf(AbstractParameter::class, $this->mockParameter->setRequired(true));
        $this->assertAttributeEquals(true, 'required', $this->mockParameter);
        $this->assertTrue($this->mockParameter->isRequired());
    }
}
