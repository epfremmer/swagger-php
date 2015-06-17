<?php
/**
 * File BodyParameterTest.php
 *
 * @author Edward Pfremmer <epfremme@nerdery.com>
 */
namespace Epfremmer\SwaggerBundle\Tests\Entity\Parameters;

use Epfremmer\SwaggerBundle\Entity\Parameters\AbstractParameter;
use Epfremmer\SwaggerBundle\Entity\Parameters\BodyParameter;
use Epfremmer\SwaggerBundle\Entity\Schemas\ObjectSchema;
use Epfremmer\SwaggerBundle\Tests\Mixin\SerializerContextTrait;

/**
 * Class BodyParameterTest
 *
 * @package Epfremmer\SwaggerBundle
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
     * @covers Epfremmer\SwaggerBundle\Entity\Parameters\BodyParameter::getSchema
     * @covers Epfremmer\SwaggerBundle\Entity\Parameters\BodyParameter::setSchema
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
     * @covers Epfremmer\SwaggerBundle\Entity\Parameters\BodyParameter
     */
    public function testSerialization()
    {
        $data = json_encode([
            'in'          => 'body',
            'name'        => 'foo',
            'description' => 'bar',
            'required'    => false,
        ]);

        $parameter = self::$serializer->deserialize($data, AbstractParameter::class, 'json');

        $this->assertInstanceOf(BodyParameter::class, $parameter);
        $this->assertAttributeEquals('body', 'in', $parameter);
        $this->assertAttributeEquals('foo', 'name', $parameter);
        $this->assertAttributeEquals('bar', 'description', $parameter);
        $this->assertAttributeEquals(false, 'required', $parameter);

        $json = self::$serializer->serialize($parameter, 'json');

        $this->assertJson($json);
        $this->assertJsonStringEqualsJsonString($data, $json);
    }
}
