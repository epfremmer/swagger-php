<?php
/**
 * File BooleanTypeTest.php
 *
 * @author Edward Pfremmer <epfremme@nerdery.com>
 */
namespace Epfremme\Swagger\Tests\Entity\Parameters\PathParameter;

use Epfremme\Swagger\Entity\Parameters\AbstractParameter;
use Epfremme\Swagger\Entity\Parameters\AbstractTypedParameter;
use Epfremme\Swagger\Entity\Parameters\PathParameter;
use Epfremme\Swagger\Tests\Mixin\SerializerContextTrait;

/**
 * Class BooleanTypeTest
 *
 * @package Epfremme\Swagger
 * @subpackage Tests\Entity\Parameters\PathParameter
 */
class BooleanTypeTest extends \PHPUnit_Framework_TestCase
{
    use SerializerContextTrait;

    /**
     * @var PathParameter\BooleanType
     */
    protected $parameter;

    /**
     * {@inheritdoc}
     */
    protected function setUp()
    {
        $this->parameter = new PathParameter\BooleanType();
    }

    /**
     * @covers Epfremme\Swagger\Entity\Parameters\PathParameter\BooleanType
     */
    public function testSerialization()
    {
        $data = json_encode([
            'in'   => AbstractParameter::IN_PATH,
            'type' => AbstractTypedParameter::BOOLEAN_TYPE,
            'name'             => 'foo',
            'description'      => 'bar',
            'required'         => false,
            'format'           => 'baz',
            'allowEmptyValues' => true,
            'default'          => false,
        ]);

        $parameter = $this->getSerializer()->deserialize($data, AbstractParameter::class, 'json');

        $this->assertInstanceOf(PathParameter\BooleanType::class, $parameter);
        $this->assertAttributeEquals(AbstractParameter::IN_PATH, 'in', $parameter);
        $this->assertAttributeEquals(AbstractTypedParameter::BOOLEAN_TYPE, 'type', $parameter);
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
