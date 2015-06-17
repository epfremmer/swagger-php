<?php
/**
 * File PathTest.php
 *
 * @author Edward Pfremmer <epfremme@nerdery.com>
 */
namespace Epfremmer\SwaggerBundle\Tests\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Epfremmer\SwaggerBundle\Entity\Operation;
use Epfremmer\SwaggerBundle\Entity\Parameters;
use Epfremmer\SwaggerBundle\Entity\Path;
use Epfremmer\SwaggerBundle\Tests\Mixin\SerializerContextTrait;

/**
 * Class PathTest
 *
 * @package Epfremmer\SwaggerBundle
 * @subpackage Tests\Entity
 */
class PathTest extends \PHPUnit_Framework_TestCase
{
    use SerializerContextTrait;

    /**
     * @var Path
     */
    protected $path;

    /**
     * {@inheritdoc}
     */
    protected function setUp()
    {
        $this->path = new Path();
    }
    
    /**
     * @covers Epfremmer\SwaggerBundle\Entity\Path::getOperations
     * @covers Epfremmer\SwaggerBundle\Entity\Path::setOperations
     */
    public function testOperations()
    {
        $operations = new ArrayCollection([
            'foo' => new Operation(),
            'bar' => new Operation(),
            'baz' => new Operation(),
        ]);

        $this->assertClassHasAttribute('operations', Path::class);
        $this->assertInstanceOf(Path::class, $this->path->setOperations($operations));
        $this->assertAttributeInstanceOf(ArrayCollection::class, 'operations', $this->path);
        $this->assertAttributeEquals($operations, 'operations', $this->path);
        $this->assertEquals($operations, $this->path->getOperations());
        $this->assertContainsOnlyInstancesOf(Operation::class, $this->path->getOperations());
    }

    /**
     * @covers Epfremmer\SwaggerBundle\Entity\Path
     */
    public function testSerialize()
    {
        $data = json_encode([
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
        ]);

        $path = self::$serializer->deserialize($data, Path::class, 'json');

        $this->assertInstanceOf(Path::class, $path);
        $this->assertAttributeInstanceOf(ArrayCollection::class, 'operations', $path);
        $this->assertAttributeContainsOnly(Operation::class, 'operations', $path);

        $json = self::$serializer->serialize($path, 'json');

        $this->assertJson($json);
        $this->assertJsonStringEqualsJsonString($data, $json);
    }
}
