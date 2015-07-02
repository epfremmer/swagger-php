<?php
/**
 * File BodyParameterTest.php
 *
 * @author Edward Pfremmer <epfremme@nerdery.com>
 */
namespace Nerdery\Swagger\Tests\Entity\Parameters;

use Nerdery\Swagger\Entity\Parameters\AbstractParameter;
use Nerdery\Swagger\Entity\Parameters\BodyParameter;
use Nerdery\Swagger\Entity\Schemas\ObjectSchema;
use Nerdery\Swagger\Tests\Mixin\SerializerContextTrait;

/**
 * Class BodyParameterTest
 *
 * @package Nerdery\Swagger
 * @subpackage Tests\Entity\Parameters
 */
class BodyParameterTest extends \PHPUnit_Framework_TestCase
{
    use SerializerContextTrait;

    /**
     * @var BodyParameter
     */
    protected $bodyParameter;

    /**
     * {@inheritdoc}
     */
    protected function setUp()
    {
        $this->bodyParameter = new BodyParameter();
    }

    /**
     * @covers Nerdery\Swagger\Entity\Parameters\BodyParameter::getSchema
     * @covers Nerdery\Swagger\Entity\Parameters\BodyParameter::setSchema
     */
    public function testSchema()
    {
        $schema = new ObjectSchema();

        $this->assertClassHasAttribute('schema', BodyParameter::class);
        $this->assertInstanceOf(BodyParameter::class, $this->bodyParameter->setSchema($schema));
        $this->assertAttributeInstanceOf(ObjectSchema::class, 'schema', $this->bodyParameter);
        $this->assertAttributeEquals($schema, 'schema', $this->bodyParameter);
        $this->assertEquals($schema, $this->bodyParameter->getSchema());
    }

    /**
     * @covers Nerdery\Swagger\Entity\Parameters\BodyParameter
     */
    public function testSerialization()
    {
        $data = json_encode([
            'in'          => AbstractParameter::IN_BODY,
            'name'        => 'foo',
            'description' => 'bar',
            'required'    => false,
            'schema'      => [
                'type' => 'string'
            ]
        ]);

        $parameter = $this->getSerializer()->deserialize($data, AbstractParameter::class, 'json');

        $this->assertInstanceOf(BodyParameter::class, $parameter);
        $this->assertAttributeEquals('body', 'in', $parameter);
        $this->assertAttributeEquals('foo', 'name', $parameter);
        $this->assertAttributeEquals('bar', 'description', $parameter);
        $this->assertAttributeEquals(false, 'required', $parameter);

        $json = $this->getSerializer()->serialize($parameter, 'json');

        $this->assertJson($json);
        $this->assertJsonStringEqualsJsonString($data, $json);
    }
}
