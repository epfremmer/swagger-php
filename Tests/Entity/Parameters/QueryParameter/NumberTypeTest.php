<?php
/**
 * File NumberTypeTest.php
 *
 * @author Edward Pfremmer <epfremme@nerdery.com>
 */
namespace Epfremmer\SwaggerBundle\Tests\Entity\Parameters\QueryParameter;

use Epfremmer\SwaggerBundle\Entity\Parameters\AbstractParameter;
use Epfremmer\SwaggerBundle\Entity\Parameters\AbstractTypedParameter;
use Epfremmer\SwaggerBundle\Entity\Parameters\QueryParameter;
use Epfremmer\SwaggerBundle\Tests\Mixin\SerializerContextTrait;

/**
 * Class NumberTypeTest
 *
 * @package Epfremmer\SwaggerBundle
 * @subpackage Tests\Entity\Parameters\QueryParameter
 */
class NumberTypeTest extends \PHPUnit_Framework_TestCase
{
    use SerializerContextTrait;

    /**
     * @var QueryParameter\NumberType
     */
    protected $parameter;

    /**
     * {@inheritdoc}
     */
    protected function setUp()
    {
        $this->parameter = new QueryParameter\NumberType();
    }

    /**
     * @covers Epfremmer\SwaggerBundle\Entity\Parameters\QueryParameter\NumberType
     */
    public function testSerialization()
    {
        $data = json_encode([
            'in'   => AbstractParameter::IN_QUERY,
            'type' => AbstractTypedParameter::NUMBER_TYPE,
            'name'             => 'foo',
            'description'      => 'bar',
            'required'         => false,
            'format'           => 'baz',
            'allowEmptyValues' => true,
            'default'          => false,
        ]);

        $parameter = self::$serializer->deserialize($data, AbstractParameter::class, 'json');

        $this->assertInstanceOf(QueryParameter\NumberType::class, $parameter);
        $this->assertAttributeEquals(AbstractParameter::IN_QUERY, 'in', $parameter);
        $this->assertAttributeEquals(AbstractTypedParameter::NUMBER_TYPE, 'type', $parameter);
        $this->assertAttributeEquals('foo', 'name', $parameter);
        $this->assertAttributeEquals('bar', 'description', $parameter);
        $this->assertAttributeEquals(false, 'required', $parameter);
        $this->assertAttributeEquals('baz', 'format', $parameter);
        $this->assertAttributeEquals(true, 'allowEmptyValues', $parameter);
        $this->assertAttributeEquals(false, 'default', $parameter);

        $json = self::$serializer->serialize($parameter, 'json');

        $this->assertJson($json);
        $this->assertJsonStringEqualsJsonString($data, $json);
    }
}