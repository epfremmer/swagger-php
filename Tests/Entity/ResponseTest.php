<?php
/**
 * File ResponseTest.php
 *
 * @author Edward Pfremmer <epfremme@nerdery.com>
 */
namespace ERP\Swagger\Tests\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use ERP\Swagger\Entity\Examples;
use ERP\Swagger\Entity\Headers;
use ERP\Swagger\Entity\Response;
use ERP\Swagger\Entity\Parameters;
use ERP\Swagger\Entity\Schemas\AbstractSchema;
use ERP\Swagger\Entity\Schemas\ObjectSchema;
use ERP\Swagger\Tests\Mixin\SerializerContextTrait;

/**
 * Class ResponseTest
 *
 * @package ERP\Swagger
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
     * @covers ERP\Swagger\Entity\Response::getDescription
     * @covers ERP\Swagger\Entity\Response::setDescription
     */
    public function testDescription()
    {
        $this->assertClassHasAttribute('description', Response::class);
        $this->assertInstanceOf(Response::class, $this->response->setDescription('foo'));
        $this->assertAttributeEquals('foo', 'description', $this->response);
        $this->assertEquals('foo', $this->response->getDescription());
    }

    /**
     * @covers ERP\Swagger\Entity\Response::getSchema
     * @covers ERP\Swagger\Entity\Response::setSchema
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
     * @covers ERP\Swagger\Entity\Response::getHeaders
     * @covers ERP\Swagger\Entity\Response::setHeaders
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
     * @covers ERP\Swagger\Entity\Response::getExamples
     * @covers ERP\Swagger\Entity\Response::setExamples
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
     * @covers ERP\Swagger\Entity\Response
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

        $response = $this->getSerializer()->deserialize($data, Response::class, 'json');

        $this->assertInstanceOf(Response::class, $response);
        $this->assertAttributeEquals('bar', 'description', $response);
        $this->assertAttributeInstanceOf(AbstractSchema::class, 'schema', $response);
        $this->assertAttributeInstanceOf(ArrayCollection::class, 'headers', $response);
        $this->assertAttributeContainsOnly(Headers\AbstractHeader::class, 'headers', $response);
        $this->assertAttributeInstanceOf(Examples::class, 'examples', $response);

        $json = $this->getSerializer()->serialize($response, 'json');

        $this->assertJson($json);
        $this->assertJsonStringEqualsJsonString($data, $json);
    }
}
