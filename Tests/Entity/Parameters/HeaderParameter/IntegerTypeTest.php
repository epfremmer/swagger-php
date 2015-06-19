<?php
/**
 * File IntegerTypeTest.php
 *
 * @author Edward Pfremmer <epfremme@nerdery.com>
 */
namespace ERP\Swagger\Tests\Entity\Parameters\HeaderParameter;

use ERP\Swagger\Entity\Parameters\AbstractParameter;
use ERP\Swagger\Entity\Parameters\AbstractTypedParameter;
use ERP\Swagger\Entity\Parameters\HeaderParameter;
use ERP\Swagger\Tests\Mixin\SerializerContextTrait;

/**
 * Class IntegerTypeTest
 *
 * @package ERP\Swagger
 * @subpackage Tests\Entity\Parameters\HeaderParameter
 */
class IntegerTypeTest extends \PHPUnit_Framework_TestCase
{
    use SerializerContextTrait;

    /**
     * @var HeaderParameter\IntegerType
     */
    protected $parameter;

    /**
     * {@inheritdoc}
     */
    protected function setUp()
    {
        $this->parameter = new HeaderParameter\IntegerType();
    }

    /**
     * @covers ERP\Swagger\Entity\Parameters\HeaderParameter\IntegerType
     */
    public function testSerialization()
    {
        $data = json_encode([
            'in'   => AbstractParameter::IN_HEADER,
            'type' => AbstractTypedParameter::INTEGER_TYPE,
            'name'             => 'foo',
            'description'      => 'bar',
            'required'         => false,
            'format'           => 'baz',
            'allowEmptyValues' => true,
            'default'          => false,
        ]);

        $parameter = $this->getSerializer()->deserialize($data, AbstractParameter::class, 'json');

        $this->assertInstanceOf(HeaderParameter\IntegerType::class, $parameter);
        $this->assertAttributeEquals(AbstractParameter::IN_HEADER, 'in', $parameter);
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