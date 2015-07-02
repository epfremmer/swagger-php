<?php
/**
 * File IntegerTypeTest.php
 *
 * @author Edward Pfremmer <epfremme@nerdery.com>
 */
namespace Nerdery\Swagger\Tests\Entity\Parameters\PathParameter;

use Nerdery\Swagger\Entity\Parameters\AbstractParameter;
use Nerdery\Swagger\Entity\Parameters\AbstractTypedParameter;
use Nerdery\Swagger\Entity\Parameters\PathParameter;
use Nerdery\Swagger\Tests\Mixin\SerializerContextTrait;

/**
 * Class IntegerTypeTest
 *
 * @package Nerdery\Swagger
 * @subpackage Tests\Entity\Parameters\PathParameter
 */
class IntegerTypeTest extends \PHPUnit_Framework_TestCase
{
    use SerializerContextTrait;

    /**
     * @var PathParameter\IntegerType
     */
    protected $parameter;

    /**
     * {@inheritdoc}
     */
    protected function setUp()
    {
        $this->parameter = new PathParameter\IntegerType();
    }

    /**
     * @covers Nerdery\Swagger\Entity\Parameters\PathParameter\IntegerType
     */
    public function testSerialization()
    {
        $data = json_encode([
            'in'   => AbstractParameter::IN_PATH,
            'type' => AbstractTypedParameter::INTEGER_TYPE,
            'name'             => 'foo',
            'description'      => 'bar',
            'required'         => false,
            'format'           => 'baz',
            'allowEmptyValues' => true,
            'default'          => false,
        ]);

        $parameter = $this->getSerializer()->deserialize($data, AbstractParameter::class, 'json');

        $this->assertInstanceOf(PathParameter\IntegerType::class, $parameter);
        $this->assertAttributeEquals(AbstractParameter::IN_PATH, 'in', $parameter);
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