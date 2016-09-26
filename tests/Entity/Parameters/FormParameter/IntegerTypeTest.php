<?php
/**
 * File IntegerTypeTest.php
 *
 * @author Edward Pfremmer <epfremme@nerdery.com>
 */
namespace Epfremme\Swagger\Tests\Entity\Parameters\FormParameter;

use Epfremme\Swagger\Entity\Parameters\AbstractParameter;
use Epfremme\Swagger\Entity\Parameters\AbstractTypedParameter;
use Epfremme\Swagger\Entity\Parameters\FormParameter;
use Epfremme\Swagger\Tests\Mixin\SerializerContextTrait;

/**
 * Class IntegerTypeTest
 *
 * @package Epfremme\Swagger
 * @subpackage Tests\Entity\Parameters\FormParameter
 */
class IntegerTypeTest extends \PHPUnit_Framework_TestCase
{
    use SerializerContextTrait;

    /**
     * @var FormParameter\IntegerType
     */
    protected $parameter;

    /**
     * {@inheritdoc}
     */
    protected function setUp()
    {
        $this->parameter = new FormParameter\IntegerType();
    }

    /**
     * @covers Epfremme\Swagger\Entity\Parameters\FormParameter\IntegerType
     */
    public function testSerialization()
    {
        $data = json_encode([
            'in'   => AbstractParameter::IN_FORM_DATA,
            'type' => AbstractTypedParameter::INTEGER_TYPE,
            'name'             => 'foo',
            'description'      => 'bar',
            'required'         => false,
            'format'           => 'baz',
            'allowEmptyValues' => true,
            'default'          => false,
        ]);

        $parameter = $this->getSerializer()->deserialize($data, AbstractParameter::class, 'json');

        $this->assertInstanceOf(FormParameter\IntegerType::class, $parameter);
        $this->assertAttributeEquals(AbstractParameter::IN_FORM_DATA, 'in', $parameter);
        $this->assertAttributeEquals(AbstractTypedParameter::INTEGER_TYPE, 'type', $parameter);
        $this->assertAttributeEquals('foo', 'name', $parameter);
        $this->assertAttributeEquals('bar', 'description', $parameter);
        $this->assertAttributeEquals(false, 'required', $parameter);
        $this->assertAttributeEquals('baz', 'format', $parameter);
        $this->assertAttributeEquals(true, 'allowEmptyValues', $parameter);
        $this->assertAttributeEquals(false, 'default', $parameter);

        $json = $this->getSerializer()->serialize($parameter, 'json');

        $this->assertJson($json);
        $this->assertJsonStringEqualsJsonString($data, $json);
    }
}
