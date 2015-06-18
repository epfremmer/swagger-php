<?php
/**
 * File SwaggerTest.php
 *
 * @author Edward Pfremmer <epfremme@nerdery.com>
 */
namespace Epfremmer\SwaggerBundle\Tests\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Epfremmer\SwaggerBundle\Entity\ExternalDocumentation;
use Epfremmer\SwaggerBundle\Entity\Headers;
use Epfremmer\SwaggerBundle\Entity\Info;
use Epfremmer\SwaggerBundle\Entity\Path;
use Epfremmer\SwaggerBundle\Entity\Response;
use Epfremmer\SwaggerBundle\Entity\Schemas\SchemaInterface;
use Epfremmer\SwaggerBundle\Entity\SecurityDefinition;
use Epfremmer\SwaggerBundle\Entity\Swagger;
use Epfremmer\SwaggerBundle\Entity\Parameters;
use Epfremmer\SwaggerBundle\Entity\Schemas\AbstractSchema;
use Epfremmer\SwaggerBundle\Entity\Schemas\ObjectSchema;
use Epfremmer\SwaggerBundle\Entity\Tag;
use Epfremmer\SwaggerBundle\Tests\Mixin\SerializerContextTrait;

/**
 * Class SwaggerTest
 *
 * @package Epfremmer\SwaggerBundle
 * @subpackage Tests\Entity
 */
class SwaggerTest extends \PHPUnit_Framework_TestCase
{
    use SerializerContextTrait;

    /**
     * @var Swagger
     */
    protected $swagger;

    /**
     * {@inheritdoc}
     */
    protected function setUp()
    {
        $this->swagger = new Swagger();
    }
    
    /**
     * @covers Epfremmer\SwaggerBundle\Entity\Swagger::getVersion
     * @covers Epfremmer\SwaggerBundle\Entity\Swagger::setVersion
     */
    public function testVersion()
    {
        $this->assertClassHasAttribute('version', Swagger::class);
        $this->assertInstanceOf(Swagger::class, $this->swagger->setVersion('1.0'));
        $this->assertAttributeEquals('1.0', 'version', $this->swagger);
        $this->assertEquals('1.0', $this->swagger->getVersion());
    }

    /**
     * @covers Epfremmer\SwaggerBundle\Entity\Swagger::getInfo
     * @covers Epfremmer\SwaggerBundle\Entity\Swagger::setInfo
     */
    public function testInfo()
    {
        $info = new Info();

        $this->assertClassHasAttribute('info', Swagger::class);
        $this->assertInstanceOf(Swagger::class, $this->swagger->setInfo($info));
        $this->assertAttributeInstanceOf(Info::class, 'info', $this->swagger);
        $this->assertAttributeEquals($info, 'info', $this->swagger);
        $this->assertEquals($info, $this->swagger->getInfo());
    }

    /**
     * @covers Epfremmer\SwaggerBundle\Entity\Swagger::getHost
     * @covers Epfremmer\SwaggerBundle\Entity\Swagger::setHost
     */
    public function testHost()
    {
        $this->assertClassHasAttribute('host', Swagger::class);
        $this->assertInstanceOf(Swagger::class, $this->swagger->setHost('foo'));
        $this->assertAttributeEquals('foo', 'host', $this->swagger);
        $this->assertEquals('foo', $this->swagger->getHost());
    }

    /**
     * @covers Epfremmer\SwaggerBundle\Entity\Swagger::getBasePath
     * @covers Epfremmer\SwaggerBundle\Entity\Swagger::setBasePath
     */
    public function testBasePath()
    {
        $this->assertClassHasAttribute('basePath', Swagger::class);
        $this->assertInstanceOf(Swagger::class, $this->swagger->setBasePath('foo'));
        $this->assertAttributeEquals('foo', 'basePath', $this->swagger);
        $this->assertEquals('foo', $this->swagger->getBasePath());
    }

    /**
     * @covers Epfremmer\SwaggerBundle\Entity\Swagger::getSchemes
     * @covers Epfremmer\SwaggerBundle\Entity\Swagger::setSchemes
     */
    public function testSchemes()
    {
        $schemes = ['foo', 'bar'];

        $this->assertClassHasAttribute('schemes', Swagger::class);
        $this->assertInstanceOf(Swagger::class, $this->swagger->setSchemes($schemes));
        $this->assertAttributeEquals($schemes, 'schemes', $this->swagger);
        $this->assertEquals($schemes, $this->swagger->getSchemes());
    }

    /**
     * @covers Epfremmer\SwaggerBundle\Entity\Swagger::getConsumes
     * @covers Epfremmer\SwaggerBundle\Entity\Swagger::setConsumes
     */
    public function testConsumes()
    {
        $consumes = ['foo', 'bar'];

        $this->assertClassHasAttribute('consumes', Swagger::class);
        $this->assertInstanceOf(Swagger::class, $this->swagger->setConsumes($consumes));
        $this->assertAttributeEquals($consumes, 'consumes', $this->swagger);
        $this->assertEquals($consumes, $this->swagger->getConsumes());
    }

    /**
     * @covers Epfremmer\SwaggerBundle\Entity\Swagger::getProduces
     * @covers Epfremmer\SwaggerBundle\Entity\Swagger::setProduces
     */
    public function testProduces()
    {
        $produces = ['foo', 'bar'];

        $this->assertClassHasAttribute('produces', Swagger::class);
        $this->assertInstanceOf(Swagger::class, $this->swagger->setProduces($produces));
        $this->assertAttributeEquals($produces, 'produces', $this->swagger);
        $this->assertEquals($produces, $this->swagger->getProduces());
    }

    /**
     * @covers Epfremmer\SwaggerBundle\Entity\Swagger::getPaths
     * @covers Epfremmer\SwaggerBundle\Entity\Swagger::setPaths
     */
    public function testPaths()
    {
        $paths = new ArrayCollection([
            'foo' => new Path(),
            'bar' => new Path(),
            'baz' => new Path(),
        ]);

        $this->assertClassHasAttribute('paths', Swagger::class);
        $this->assertInstanceOf(Swagger::class, $this->swagger->setPaths($paths));
        $this->assertAttributeInstanceOf(ArrayCollection::class, 'paths', $this->swagger);
        $this->assertAttributeEquals($paths, 'paths', $this->swagger);
        $this->assertEquals($paths, $this->swagger->getPaths());
        $this->assertContainsOnlyInstancesOf(Path::class, $this->swagger->getPaths());
    }

    /**
     * @covers Epfremmer\SwaggerBundle\Entity\Swagger::getDefinitions
     * @covers Epfremmer\SwaggerBundle\Entity\Swagger::setDefinitions
     */
    public function testDefinitions()
    {
        $definitions = new ArrayCollection([
            'name' => new ObjectSchema(),
        ]);

        $this->assertClassHasAttribute('definitions', Swagger::class);
        $this->assertInstanceOf(Swagger::class, $this->swagger->setDefinitions($definitions));
        $this->assertAttributeInstanceOf(ArrayCollection::class, 'definitions', $this->swagger);
        $this->assertAttributeEquals($definitions, 'definitions', $this->swagger);
        $this->assertEquals($definitions, $this->swagger->getDefinitions());
        $this->assertContainsOnlyInstancesOf(ObjectSchema::class, $this->swagger->getDefinitions());
    }

    /**
     * @covers Epfremmer\SwaggerBundle\Entity\Swagger::getParameters
     * @covers Epfremmer\SwaggerBundle\Entity\Swagger::setParameters
     */
    public function testParameters()
    {
        $parameters = new ArrayCollection([
            'foo' => new Parameters\FormParameter\StringType(),
            'bar' => new Parameters\FormParameter\IntegerType(),
            'baz' => new Parameters\FormParameter\BooleanType(),
        ]);

        $this->assertClassHasAttribute('parameters', Swagger::class);
        $this->assertInstanceOf(Swagger::class, $this->swagger->setParameters($parameters));
        $this->assertAttributeInstanceOf(ArrayCollection::class, 'parameters', $this->swagger);
        $this->assertAttributeEquals($parameters, 'parameters', $this->swagger);
        $this->assertEquals($parameters, $this->swagger->getParameters());
        $this->assertContainsOnlyInstancesOf(Parameters\AbstractTypedParameter::class, $this->swagger->getParameters());
    }
    
    /**
     * @covers Epfremmer\SwaggerBundle\Entity\Swagger::getResponses
     * @covers Epfremmer\SwaggerBundle\Entity\Swagger::setResponses
     */
    public function testResponses()
    {
        $responses = new ArrayCollection([
            'foo' => new Response(),
            'bar' => new Response(),
        ]);
        
        $this->assertClassHasAttribute('responses', Swagger::class);
        $this->assertInstanceOf(Swagger::class, $this->swagger->setResponses($responses));
        $this->assertAttributeInstanceOf(ArrayCollection::class, 'responses', $this->swagger);
        $this->assertAttributeEquals($responses, 'responses', $this->swagger);
        $this->assertEquals($responses, $this->swagger->getResponses());
        $this->assertContainsOnlyInstancesOf(Response::class, $this->swagger->getResponses());
    }

    /**
     * @covers Epfremmer\SwaggerBundle\Entity\Swagger::getSecurityDefinitions
     * @covers Epfremmer\SwaggerBundle\Entity\Swagger::setSecurityDefinitions
     */
    public function testSecurityDefinitions()
    {
        $securityDefinitions = new ArrayCollection([
            'foo' => new SecurityDefinition(),
            'bar' => new SecurityDefinition(),
        ]);

        $this->assertClassHasAttribute('securityDefinitions', Swagger::class);
        $this->assertInstanceOf(Swagger::class, $this->swagger->setSecurityDefinitions($securityDefinitions));
        $this->assertAttributeInstanceOf(ArrayCollection::class, 'securityDefinitions', $this->swagger);
        $this->assertAttributeEquals($securityDefinitions, 'securityDefinitions', $this->swagger);
        $this->assertEquals($securityDefinitions, $this->swagger->getSecurityDefinitions());
        $this->assertContainsOnlyInstancesOf(SecurityDefinition::class, $this->swagger->getSecurityDefinitions());
    }

    /**
     * @covers Epfremmer\SwaggerBundle\Entity\Swagger::getSecurity
     * @covers Epfremmer\SwaggerBundle\Entity\Swagger::setSecurity
     */
    public function testSecurity()
    {
        $security = new ArrayCollection([
            'foo' => ['foo', 'bar'],
            'bar' => ['baz'],
        ]);

        $this->assertClassHasAttribute('security', Swagger::class);
        $this->assertInstanceOf(Swagger::class, $this->swagger->setSecurity($security));
        $this->assertAttributeInstanceOf(ArrayCollection::class, 'security', $this->swagger);
        $this->assertAttributeEquals($security, 'security', $this->swagger);
        $this->assertEquals($security, $this->swagger->getSecurity());
        $this->assertContainsOnly('array', $this->swagger->getSecurity());
    }

    /**
     * @covers Epfremmer\SwaggerBundle\Entity\Swagger::getTags
     * @covers Epfremmer\SwaggerBundle\Entity\Swagger::setTags
     */
    public function testTags()
    {
        $tags = new ArrayCollection([
            'foo' => new SecurityDefinition(),
            'bar' => new SecurityDefinition(),
        ]);

        $this->assertClassHasAttribute('tags', Swagger::class);
        $this->assertInstanceOf(Swagger::class, $this->swagger->setTags($tags));
        $this->assertAttributeInstanceOf(ArrayCollection::class, 'tags', $this->swagger);
        $this->assertAttributeEquals($tags, 'tags', $this->swagger);
        $this->assertEquals($tags, $this->swagger->getTags());
        $this->assertContainsOnlyInstancesOf(SecurityDefinition::class, $this->swagger->getTags());
    }

    /**
     * @covers Epfremmer\SwaggerBundle\Entity\Swagger::getExternalDocs
     * @covers Epfremmer\SwaggerBundle\Entity\Swagger::setExternalDocs
     */
    public function testExternalDocs()
    {
        $externalDocs = new ExternalDocumentation();

        $this->assertClassHasAttribute('externalDocs', Swagger::class);
        $this->assertInstanceOf(Swagger::class, $this->swagger->setExternalDocs($externalDocs));
        $this->assertAttributeInstanceOf(ExternalDocumentation::class, 'externalDocs', $this->swagger);
        $this->assertAttributeEquals($externalDocs, 'externalDocs', $this->swagger);
        $this->assertEquals($externalDocs, $this->swagger->getExternalDocs());
    }

    /**
     * @covers Epfremmer\SwaggerBundle\Entity\Swagger
     */
    public function testSerialize()
    {
        $data = json_encode([
            'swagger' => '2.0',
            'info' => [
                'title'          => 'foo',
                'description'    => 'bar',
                'termsOfService' => 'baz',
                'contact' => (object)[],
                'license' => (object)[],
                'version' => '1.0.0'
            ],
            'host' => 'http://www.example.com',
            'basePath' => '/v1',
            'schemes' => ['http', 'https'],
            'consumes' => [
                'application/x-www-form-urlencoded'
            ],
            'produces' => [
                'application/json',
                'application/xml'
            ],
            'paths' => [
                '/test' => [
                    'get' => [
                        'summary' => 'foo',
                        'description' => 'bar',
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
                                    'read:pets',
                                ]
                            ]
                        ],
                        'deprecated' => false,
                    ],
                    'post' => [
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
                                    'read:pets',
                                ]
                            ]
                        ],
                        'deprecated' => true,
                    ],
                ],
            ],
            'definitions' => [
                'User' => [
                    'type' => AbstractSchema::OBJECT_TYPE,
                    'format'      => 'foo',
                    'title'       => 'bar',
                    'description' => 'baz',
                    'example'     => 'qux',
                    'externalDocs' => (object)[],
                ]
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
            'securityDefinitions' => [
                'api_key' => [
                    'type' => 'apiKey',
                    'name' => 'api_key',
                    'in' => 'header'
                ],
                'petstore_auth' => [
                    'type' => 'oauth2',
                    'authorizationUrl' => 'http =>//swagger.io/api/oauth/dialog',
                    'flow' => 'implicit',
                    'scopes' => [
                        'write =>pets' => 'modify pets in your account',
                        'read =>pets' => 'read your pets'
                    ]
                ]
            ],
            'security' => [
                [
                    'petstore_auth' => [
                        'write:pets',
                        'read:pets',
                    ]
                ]
            ],
            'tags' => [
                '1.0' => [
                    'name'         => 'foo',
                    'description'  => 'bar',
                    'externalDocs' => (object)[],
                ]
            ],
            'externalDocs' => [
                'description' => 'foo',
                'url'         => 'bar',
            ],
        ]);

        $swagger = $this->getSerializer()->deserialize($data, Swagger::class, 'json');

        $this->assertInstanceOf(Swagger::class, $swagger);
        $this->assertAttributeInstanceOf(Info::class, 'info', $swagger);
        $this->assertAttributeEquals('http://www.example.com', 'host', $swagger);
        $this->assertAttributeEquals('/v1', 'basePath', $swagger);
        $this->assertAttributeEquals(['http', 'https'], 'schemes', $swagger);
        $this->assertAttributeInternalType('array', 'consumes', $swagger);
        $this->assertAttributeContainsOnly('string', 'consumes', $swagger);
        $this->assertAttributeInternalType('array', 'produces', $swagger);
        $this->assertAttributeContainsOnly('string', 'produces', $swagger);
        $this->assertAttributeInstanceOf(ArrayCollection::class, 'paths', $swagger);
        $this->assertAttributeContainsOnly(Path::class, 'paths', $swagger);
        $this->assertAttributeInstanceOf(ArrayCollection::class, 'definitions', $swagger);
        $this->assertAttributeContainsOnly(SchemaInterface::class, 'definitions', $swagger);
        $this->assertAttributeInstanceOf(ArrayCollection::class, 'parameters', $swagger);
        $this->assertAttributeContainsOnly(Parameters\AbstractTypedParameter::class, 'parameters', $swagger);
        $this->assertAttributeInstanceOf(ArrayCollection::class, 'responses', $swagger);
        $this->assertAttributeContainsOnly(Response::class, 'responses', $swagger);
        $this->assertAttributeInstanceOf(ArrayCollection::class, 'securityDefinitions', $swagger);
        $this->assertAttributeContainsOnly(SecurityDefinition::class, 'securityDefinitions', $swagger);
        $this->assertAttributeInstanceOf(ArrayCollection::class, 'security', $swagger);
        $this->assertAttributeContainsOnly('array', 'security', $swagger);
        $this->assertAttributeInstanceOf(ArrayCollection::class, 'tags', $swagger);
        $this->assertAttributeContainsOnly(Tag::class, 'tags', $swagger);
        $this->assertAttributeInstanceOf(ExternalDocumentation::class, 'externalDocs', $swagger);

        $json = $this->getSerializer()->serialize($swagger, 'json');

        $this->assertJson($json);
        $this->assertJsonStringEqualsJsonString($data, $json);
    }
}
