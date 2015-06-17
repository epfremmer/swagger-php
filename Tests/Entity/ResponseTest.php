<?php
/**
 * File ResponseTest.php
 *
 * @author Edward Pfremmer <epfremme@nerdery.com>
 */
namespace Epfremmer\SwaggerBundle\Tests\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Epfremmer\SwaggerBundle\Entity\Examples;
use Epfremmer\SwaggerBundle\Entity\ExternalDocumentation;
use Epfremmer\SwaggerBundle\Entity\Headers;
use Epfremmer\SwaggerBundle\Entity\Response;
use Epfremmer\SwaggerBundle\Entity\Parameters;
use Epfremmer\SwaggerBundle\Entity\Schemas\AbstractSchema;
use Epfremmer\SwaggerBundle\Entity\Schemas\ObjectSchema;
use Epfremmer\SwaggerBundle\Tests\Mixin\SerializerContextTrait;

/**
 * Class ResponseTest
 *
 * @package Epfremmer\SwaggerBundle
 * @subpackage Tests\Entity
 */
class ResponseTest extends \PHPUnit_Framework_TestCase
{
    use SerializerContextTrait;

    /**
     * @var Response
     */
    protected $response;

    /**
     * {@inheritdoc}
     */
    protected function setUp()
    {
        $this->response = new Response();
    }
    
    /**
     * @covers Epfremmer\SwaggerBundle\Entity\Response::getDescription
     * @covers Epfremmer\SwaggerBundle\Entity\Response::setDescription
     */
    public function testDescription()
    {
        $this->assertClassHasAttribute('description', Response::class);
        $this->assertInstanceOf(Response::class, $this->response->setDescription('foo'));
        $this->assertAttributeEquals('foo', 'description', $this->response);
        $this->assertEquals('foo', $this->response->getDescription());
    }

    /**
     * @covers Epfremmer\SwaggerBundle\Entity\Response::getSchema
     * @covers Epfremmer\SwaggerBundle\Entity\Response::setSchema
     */
    public function testSchema()
    {
        $schema = new ObjectSchema();

        $this->assertClassHasAttribute('schema', Response::class);
        $this->assertInstanceOf(Response::class, $this->response->setSchema($schema));
        $this->assertAttributeInstanceOf(ObjectSchema::class, 'schema', $this->response);
        $this->assertAttributeEquals($schema, 'schema', $this->response);
        $this->assertEquals($schema, $this->response->getSchema());
    }

    /**
     * @covers Epfremmer\SwaggerBundle\Entity\Response::getHeaders
     * @covers Epfremmer\SwaggerBundle\Entity\Response::setHeaders
     */
    public function testHeaders()
    {
        $headers = new ArrayCollection([
            'foo' => new Headers\StringHeader(),
            'bar' => new Headers\IntegerHeader(),
            'baz' => new Headers\StringHeader(),
        ]);

        $this->assertClassHasAttribute('headers', Response::class);
        $this->assertInstanceOf(Response::class, $this->response->setHeaders($headers));
        $this->assertAttributeInstanceOf(ArrayCollection::class, 'headers', $this->response);
        $this->assertAttributeEquals($headers, 'headers', $this->response);
        $this->assertEquals($headers, $this->response->getHeaders());
        $this->assertContainsOnlyInstancesOf(Headers\AbstractHeader::class, $this->response->getHeaders());
    }
    
    /**
     * @covers Epfremmer\SwaggerBundle\Entity\Response::getExamples
     * @covers Epfremmer\SwaggerBundle\Entity\Response::setExamples
     */
    public function testExamples()
    {
        $examples = new Examples();
        
        $this->assertClassHasAttribute('examples', Response::class);
        $this->assertInstanceOf(Response::class, $this->response->setExamples($examples));
        $this->assertAttributeInstanceOf(Examples::class, 'examples', $this->response);
        $this->assertAttributeEquals($examples, 'examples', $this->response);
        $this->assertEquals($examples, $this->response->getExamples());
    }

    /**
     * @covers Epfremmer\SwaggerBundle\Entity\Response
     */
    public function testSerialize()
    {
        $data = json_encode([
            'description' => 'bar',
            'schema' => [
                'type' => AbstractSchema::OBJECT_TYPE,
                'format'      => 'foo',
                'title'       => 'bar',
                'description' => 'baz',
                'example'     => 'qux',
                'externalDocs' => (object)[],
            ],
            'headers' => [
                'X-Rate-Limit-Limit' => [
                    'description' => 'The number of allowed requests in the current period',
                    'type' => 'integer'
                ],
                'X-Rate-Limit-Remaining' => [
                    'description' => 'The number of remaining requests in the current period',
                    'type' => 'integer'
                ],
                'X-Rate-Limit-Reset' => [
                    'description' => 'The number of seconds left in the current period',
                    'type' => 'integer'
                ],
            ],
            'examples' => [
                'text/plain' => [
                    'foo' => 'bar',
                    'baz' => 'foo'
                ],
                'application/json' => [
                    'key' => 'any'
                ],
            ]
        ]);

        $response = self::$serializer->deserialize($data, Response::class, 'json');

        $this->assertInstanceOf(Response::class, $response);
        $this->assertAttributeEquals('bar', 'description', $response);
        $this->assertAttributeInstanceOf(AbstractSchema::class, 'schema', $response);
        $this->assertAttributeInstanceOf(ArrayCollection::class, 'headers', $response);
        $this->assertAttributeContainsOnly(Headers\AbstractHeader::class, 'headers', $response);
        $this->assertAttributeInstanceOf(Examples::class, 'examples', $response);

        $json = self::$serializer->serialize($response, 'json');

        $this->assertJson($json);
        $this->assertJsonStringEqualsJsonString($data, $json);
    }
}
