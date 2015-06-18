<?php
/**
 * File OperationTest.php
 *
 * @author Edward Pfremmer <epfremme@nerdery.com>
 */
namespace Epfremmer\SwaggerBundle\Tests\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Epfremmer\SwaggerBundle\Entity\ExternalDocumentation;
use Epfremmer\SwaggerBundle\Entity\Operation;
use Epfremmer\SwaggerBundle\Entity\Parameters;
use Epfremmer\SwaggerBundle\Entity\Response;
use Epfremmer\SwaggerBundle\Tests\Mixin\SerializerContextTrait;

/**
 * Class OperationTest
 *
 * @package Epfremmer\SwaggerBundle
 * @subpackage Tests\Entity
 */
class OperationTest extends \PHPUnit_Framework_TestCase
{
    use SerializerContextTrait;

    /**
     * @var Operation
     */
    protected $operation;

    /**
     * {@inheritdoc}
     */
    protected function setUp()
    {
        $this->operation = new Operation();
    }

    /**
     * @covers Epfremmer\SwaggerBundle\Entity\Operation::getTags
     * @covers Epfremmer\SwaggerBundle\Entity\Operation::setTags
     */
    public function testTags()
    {
        $tags = ['foo', 'bar'];
        
        $this->assertClassHasAttribute('tags', Operation::class);
        $this->assertInstanceOf(Operation::class, $this->operation->setTags($tags));
        $this->assertAttributeEquals($tags, 'tags', $this->operation);
        $this->assertEquals($tags, $this->operation->getTags());
    }

    /**
     * @covers Epfremmer\SwaggerBundle\Entity\Operation::getSummary
     * @covers Epfremmer\SwaggerBundle\Entity\Operation::setSummary
     */
    public function testSummary()
    {
        $this->assertClassHasAttribute('summary', Operation::class);
        $this->assertInstanceOf(Operation::class, $this->operation->setSummary('foo'));
        $this->assertAttributeEquals('foo', 'summary', $this->operation);
        $this->assertEquals('foo', $this->operation->getSummary());
    }

    /**
     * @covers Epfremmer\SwaggerBundle\Entity\Operation::getDescription
     * @covers Epfremmer\SwaggerBundle\Entity\Operation::setDescription
     */
    public function testDescription()
    {
        $this->assertClassHasAttribute('description', Operation::class);
        $this->assertInstanceOf(Operation::class, $this->operation->setDescription('foo'));
        $this->assertAttributeEquals('foo', 'description', $this->operation);
        $this->assertEquals('foo', $this->operation->getDescription());
    }

    /**
     * @covers Epfremmer\SwaggerBundle\Entity\Operation::getExternalDocs
     * @covers Epfremmer\SwaggerBundle\Entity\Operation::setExternalDocs
     */
    public function testExternalDocs()
    {
        $externalDocs = new ExternalDocumentation();

        $this->assertClassHasAttribute('externalDocs', Operation::class);
        $this->assertInstanceOf(Operation::class, $this->operation->setExternalDocs($externalDocs));
        $this->assertAttributeInstanceOf(ExternalDocumentation::class, 'externalDocs', $this->operation);
        $this->assertAttributeEquals($externalDocs, 'externalDocs', $this->operation);
        $this->assertEquals($externalDocs, $this->operation->getExternalDocs());
    }

    /**
     * @covers Epfremmer\SwaggerBundle\Entity\Operation::getOperationId
     * @covers Epfremmer\SwaggerBundle\Entity\Operation::setOperationId
     */
    public function testOperationId()
    {
        $this->assertClassHasAttribute('operationId', Operation::class);
        $this->assertInstanceOf(Operation::class, $this->operation->setOperationId('foo'));
        $this->assertAttributeEquals('foo', 'operationId', $this->operation);
        $this->assertEquals('foo', $this->operation->getOperationId());
    }

    /**
     * @covers Epfremmer\SwaggerBundle\Entity\Operation::getConsumes
     * @covers Epfremmer\SwaggerBundle\Entity\Operation::setConsumes
     */
    public function testConsumes()
    {
        $consumes = ['foo', 'bar'];

        $this->assertClassHasAttribute('consumes', Operation::class);
        $this->assertInstanceOf(Operation::class, $this->operation->setConsumes($consumes));
        $this->assertAttributeEquals($consumes, 'consumes', $this->operation);
        $this->assertEquals($consumes, $this->operation->getConsumes());
    }

    /**
     * @covers Epfremmer\SwaggerBundle\Entity\Operation::getProduces
     * @covers Epfremmer\SwaggerBundle\Entity\Operation::setProduces
     */
    public function testProduces()
    {
        $produces = ['foo', 'bar'];

        $this->assertClassHasAttribute('produces', Operation::class);
        $this->assertInstanceOf(Operation::class, $this->operation->setProduces($produces));
        $this->assertAttributeEquals($produces, 'produces', $this->operation);
        $this->assertEquals($produces, $this->operation->getProduces());
    }

    /**
     * @covers Epfremmer\SwaggerBundle\Entity\Operation::getParameters
     * @covers Epfremmer\SwaggerBundle\Entity\Operation::setParameters
     */
    public function testParameters()
    {
        $parameters = new ArrayCollection([
            'foo' => new Parameters\FormParameter\StringType(),
            'bar' => new Parameters\FormParameter\IntegerType(),
            'baz' => new Parameters\FormParameter\BooleanType(),
        ]);

        $this->assertClassHasAttribute('parameters', Operation::class);
        $this->assertInstanceOf(Operation::class, $this->operation->setParameters($parameters));
        $this->assertAttributeInstanceOf(ArrayCollection::class, 'parameters', $this->operation);
        $this->assertAttributeEquals($parameters, 'parameters', $this->operation);
        $this->assertEquals($parameters, $this->operation->getParameters());
        $this->assertContainsOnlyInstancesOf(Parameters\AbstractTypedParameter::class, $this->operation->getParameters());
    }

    /**
     * @covers Epfremmer\SwaggerBundle\Entity\Operation::getResponses
     * @covers Epfremmer\SwaggerBundle\Entity\Operation::setResponses
     */
    public function testResponses()
    {
        $responses = new ArrayCollection([
            'foo' => new Response(),
            'bar' => new Response(),
        ]);

        $this->assertClassHasAttribute('responses', Operation::class);
        $this->assertInstanceOf(Operation::class, $this->operation->setResponses($responses));
        $this->assertAttributeInstanceOf(ArrayCollection::class, 'responses', $this->operation);
        $this->assertAttributeEquals($responses, 'responses', $this->operation);
        $this->assertEquals($responses, $this->operation->getResponses());
        $this->assertContainsOnlyInstancesOf(Response::class, $this->operation->getResponses());
    }

    /**
     * @covers Epfremmer\SwaggerBundle\Entity\Operation::getSchemes
     * @covers Epfremmer\SwaggerBundle\Entity\Operation::setSchemes
     */
    public function testSchemes()
    {
        $schemes = ['foo', 'bar'];

        $this->assertClassHasAttribute('schemes', Operation::class);
        $this->assertInstanceOf(Operation::class, $this->operation->setSchemes($schemes));
        $this->assertAttributeEquals($schemes, 'schemes', $this->operation);
        $this->assertEquals($schemes, $this->operation->getSchemes());
    }

    /**
     * @covers Epfremmer\SwaggerBundle\Entity\Operation::isDeprecated
     * @covers Epfremmer\SwaggerBundle\Entity\Operation::setDeprecated
     */
    public function testDeprecated()
    {

        $this->assertClassHasAttribute('deprecated', Operation::class);
        $this->assertInstanceOf(Operation::class, $this->operation->setDeprecated(true));
        $this->assertAttributeInternalType('boolean', 'deprecated', $this->operation);
        $this->assertAttributeEquals(true, 'deprecated', $this->operation);
        $this->assertTrue($this->operation->isDeprecated());
    }

    /**
     * @covers Epfremmer\SwaggerBundle\Entity\Operation::getSecurity
     * @covers Epfremmer\SwaggerBundle\Entity\Operation::setSecurity
     */
    public function testSecurity()
    {
        $security = new ArrayCollection([
            'foo' => ['foo', 'bar'],
            'bar' => ['baz'],
        ]);

        $this->assertClassHasAttribute('security', Operation::class);
        $this->assertInstanceOf(Operation::class, $this->operation->setSecurity($security));
        $this->assertAttributeInstanceOf(ArrayCollection::class, 'security', $this->operation);
        $this->assertAttributeEquals($security, 'security', $this->operation);
        $this->assertEquals($security, $this->operation->getSecurity());
        $this->assertContainsOnly('array', $this->operation->getSecurity());
    }

    /**
     * @covers Epfremmer\SwaggerBundle\Entity\Operation
     */
    public function testSerialize()
    {
        $data = json_encode([
            'tags' => [
                'foo'
            ],
            'summary' => 'foo',
            'description' => 'bar',
            'externalDocs' => (object)[],
            'operationId' => 'baz',
            'consumes' => [
                'application/x-www-form-urlencoded'
            ],
            'produces' => [
                'application/json',
                'application/xml'
            ],
            'parameters' => [
                [
                    'name' => 'petId',
                    'in' => Parameters\AbstractParameter::IN_PATH,
                    'description' => 'ID of pet that needs to be updated',
                    'required' => true,
                    'type' => Parameters\AbstractTypedParameter::STRING_TYPE
                ],
                [
                    'name' => 'name',
                    'in' => Parameters\AbstractParameter::IN_FORM_DATA,
                    'description' => 'Updated name of the pet',
                    'required' => false,
                    'type' => Parameters\AbstractTypedParameter::STRING_TYPE
                ],
                [
                    'name' => 'status',
                    'in' => Parameters\AbstractParameter::IN_FORM_DATA,
                    'description' => 'Updated status of the pet',
                    'required' => false,
                    'type' => Parameters\AbstractTypedParameter::STRING_TYPE
                ]
            ],
            'responses' => [
                '200' => [
                    'description' => 'Pet updated.'
                ],
                '405' => [
                    'description' => 'Invalid input'
                ]
            ],
            'schemes' => ['http', 'https'],
            'security' => [
                [
                    'petstore_auth' => [
                        'write:pets',
                        'read:pets',
                    ]
                ]
            ],
            'deprecated' => true,
        ]);

        $operation = $this->getSerializer()->deserialize($data, Operation::class, 'json');

        $this->assertInstanceOf(Operation::class, $operation);
        $this->assertAttributeEquals(['foo'], 'tags', $operation);
        $this->assertAttributeEquals('foo', 'summary', $operation);
        $this->assertAttributeEquals('bar', 'description', $operation);
        $this->assertAttributeEquals('baz', 'operationId', $operation);
        $this->assertAttributeInstanceOf(ExternalDocumentation::class, 'externalDocs', $operation);
        $this->assertAttributeInternalType('array', 'consumes', $operation);
        $this->assertAttributeContainsOnly('string', 'consumes', $operation);
        $this->assertAttributeInternalType('array', 'produces', $operation);
        $this->assertAttributeContainsOnly('string', 'produces', $operation);
        $this->assertAttributeInstanceOf(ArrayCollection::class, 'parameters', $operation);
        $this->assertAttributeContainsOnly(Parameters\AbstractTypedParameter::class, 'parameters', $operation);
        $this->assertAttributeInstanceOf(ArrayCollection::class, 'responses', $operation);
        $this->assertAttributeContainsOnly(Response::class, 'responses', $operation);
        $this->assertAttributeInternalType('array', 'schemes', $operation);
        $this->assertAttributeContainsOnly('string', 'schemes', $operation);
        $this->assertAttributeInstanceOf(ArrayCollection::class, 'security', $operation);
        $this->assertAttributeContainsOnly('array', 'security', $operation);
        $this->assertAttributeEquals(true, 'deprecated', $operation);

        $json = $this->getSerializer()->serialize($operation, 'json');

        $this->assertJson($json);
        $this->assertJsonStringEqualsJsonString($data, $json);
    }
}
