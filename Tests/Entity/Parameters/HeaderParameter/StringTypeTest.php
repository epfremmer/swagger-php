<?php
/**
 * File StringTypeTest.php
 *
 * @author Edward Pfremmer <epfremme@nerdery.com>
 */
namespace Epfremmer\SwaggerBundle\Tests\Entity\Parameters\HeaderParameter;

use Epfremmer\SwaggerBundle\Entity\Parameters\AbstractParameter;
use Epfremmer\SwaggerBundle\Entity\Parameters\AbstractTypedParameter;
use Epfremmer\SwaggerBundle\Entity\Parameters\HeaderParameter;
use Epfremmer\SwaggerBundle\Tests\Mixin\SerializerContextTrait;

/**
 * Class StringTypeTest
 *
 * @package Epfremmer\SwaggerBundle
 * @subpackage Entity\Parameters\HeaderParameter
 */
class StringTypeTest extends \PHPUnit_Framework_TestCase
{
    use SerializerContextTrait;

    /**
     * @var HeaderParameter\StringType
     */
    protected $parameter;

    /**
     * {@inheritdoc}
     */
    protected function setUp()
    {
        $this->parameter = new HeaderParameter\StringType();
    }

    /**
     * @covers Epfremmer\SwaggerBundle\Entity\Parameters\HeaderParameter\StringType
     */
    public function testSerialization()
    {
        $data = json_encode([
            'in'   => AbstractParameter::IN_HEADER,
            'type' => AbstractTypedParameter::STRING_TYPE,
            'name'             => 'foo',
            'description'      => 'bar',
            'required'         => false,
            'format'           => 'baz',
            'allowEmptyValues' => true,
            'default'          => false,
        ]);

        $parameter = self::$serializer->deserialize($data, AbstractParameter::class, 'json');

        $this->assertInstanceOf(HeaderParameter\StringType::class, $parameter);
        $this->assertAttributeEquals(AbstractParameter::IN_HEADER, 'in', $parameter);
        $this->assertAttributeEquals(AbstractTypedParameter::STRING_TYPE, 'type', $parameter);
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