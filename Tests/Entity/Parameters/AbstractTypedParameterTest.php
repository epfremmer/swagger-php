<?php
/**
 * File AbstractTypedParameterTest.php
 *
 * @author Edward Pfremmer <epfremme@nerdery.com>
 */
namespace Epfremmer\SwaggerBundle\Tests\Entity\Parameters;

use Epfremmer\SwaggerBundle\Entity\Parameters\AbstractTypedParameter;

/**
 * Class AbstractTypedParameterTest
 *
 * @package Epfremmer\SwaggerBundle
 * @subpackage Tests\Entity\Parameters
 */
class AbstractTypedParameterTest extends \PHPUnit_Framework_TestCase
{

    /**
     * @var AbstractTypedParameter|\PHPUnit_Framework_MockObject_MockObject
     */
    protected $mockParameter;

    /**
     * {@inheritdoc}
     */
    protected function setUp()
    {
        $this->mockParameter = $this->getMockForAbstractClass(AbstractTypedParameter::class);
    }

    /**
     * @covers Epfremmer\SwaggerBundle\Entity\Parameters\AbstractTypedParameter::getType
     * @covers Epfremmer\SwaggerBundle\Entity\Parameters\AbstractTypedParameter::setType
     */
    public function testType()
    {
        $this->assertClassHasAttribute('type', AbstractTypedParameter::class);
        $this->assertInstanceOf(AbstractTypedParameter::class, $this->mockParameter->setType('foo'));
        $this->assertAttributeEquals('foo', 'type', $this->mockParameter);
        $this->assertEquals('foo', $this->mockParameter->getType());
    }

    /**
     * @covers Epfremmer\SwaggerBundle\Entity\Parameters\AbstractTypedParameter::getFormat
     * @covers Epfremmer\SwaggerBundle\Entity\Parameters\AbstractTypedParameter::setFormat
     */
    public function testFormat()
    {
        $this->assertClassHasAttribute('format', AbstractTypedParameter::class);
        $this->assertInstanceOf(AbstractTypedParameter::class, $this->mockParameter->setFormat('foo'));
        $this->assertAttributeEquals('foo', 'format', $this->mockParameter);
        $this->assertEquals('foo', $this->mockParameter->getFormat());
    }

    /**
     * @covers Epfremmer\SwaggerBundle\Entity\Parameters\AbstractTypedParameter::isAllowEmptyValues
     * @covers Epfremmer\SwaggerBundle\Entity\Parameters\AbstractTypedParameter::setAllowEmptyValues
     */
    public function testAllowEmptyValues()
    {
        $this->assertClassHasAttribute('allowEmptyValues', AbstractTypedParameter::class);
        $this->assertInstanceOf(AbstractTypedParameter::class, $this->mockParameter->setAllowEmptyValues(true));
        $this->assertAttributeInternalType('boolean', 'allowEmptyValues', $this->mockParameter);
        $this->assertAttributeEquals(true, 'allowEmptyValues', $this->mockParameter);
        $this->assertTrue($this->mockParameter->isAllowEmptyValues());
    }

    /**
     * @covers Epfremmer\SwaggerBundle\Entity\Parameters\AbstractTypedParameter::getDefault
     * @covers Epfremmer\SwaggerBundle\Entity\Parameters\AbstractTypedParameter::setDefault
     */
    public function testDefault()
    {
        $this->assertClassHasAttribute('default', AbstractTypedParameter::class);
        $this->assertInstanceOf(AbstractTypedParameter::class, $this->mockParameter->setDefault('foo'));
        $this->assertAttributeEquals('foo', 'default', $this->mockParameter);
        $this->assertEquals('foo', $this->mockParameter->getDefault());
    }
}
