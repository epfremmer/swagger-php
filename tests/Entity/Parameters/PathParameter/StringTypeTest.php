<?php
/**
 * File StringTypeTest.php
 *
 * @author Edward Pfremmer <epfremme@nerdery.com>
 */
namespace Epfremme\Swagger\Tests\Entity\Parameters\PathParameter;

use Epfremme\Swagger\Entity\Parameters\AbstractParameter;
use Epfremme\Swagger\Entity\Parameters\AbstractTypedParameter;
use Epfremme\Swagger\Entity\Parameters\PathParameter;
use Epfremme\Swagger\Tests\Mixin\SerializerContextTrait;

/**
 * Class StringTypeTest
 *
 * @package Epfremme\Swagger
 * @subpackage Entity\Parameters\PathParameter
 */
class StringTypeTest extends \PHPUnit_Framework_TestCase
{
    use SerializerContextTrait;

    /**
     * @var PathParameter\StringType
     */
    protected $parameter;

    /**
     * {@inheritdoc}
     */
    protected function setUp()
    {
        $this->parameter = new PathParameter\StringType();
    }

    /**
     * @covers Epfremme\Swagger\Entity\Parameters\PathParameter\StringType
     */
    public function testSerialization()
    {
        $data = json_encode([
            'in'   => AbstractParameter::IN_PATH,
            'type' => AbstractTypedParameter::STRING_TYPE,
            'name'             => 'foo',
            'description'      => 'bar',
            'required'         => false,
            'format'           => 'baz',
            'allowEmptyValues' => true,
            'default'          => false,
        ]);

        $parameter = $this->getSerializer()->deserialize($data, AbstractParameter::class, 'json');

        $this->assertInstanceOf(PathParameter\StringType::class, $parameter);
        $this->assertAttributeEquals(AbstractParameter::IN_PATH, 'in', $parameter);
        $this->assertAttributeEquals(AbstractTypedParameter::STRING_TYPE, 'type', $parameter);
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
