<?php
/**
 * File PathTest.php
 *
 * @author Edward Pfremmer <epfremme@nerdery.com>
 */
namespace Nerdery\Swagger\Tests\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Nerdery\Swagger\Entity\Operation;
use Nerdery\Swagger\Entity\Parameters;
use Nerdery\Swagger\Entity\Path;
use Nerdery\Swagger\Tests\Mixin\SerializerContextTrait;

/**
 * Class PathTest
 *
 * @package Nerdery\Swagger
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
     * @covers Nerdery\Swagger\Entity\Path::getOperations
     * @covers Nerdery\Swagger\Entity\Path::setOperations
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
     * @covers Nerdery\Swagger\Entity\Path
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

        $path = $this->getSerializer()->deserialize($data, Path::class, 'json');

        $this->assertInstanceOf(Path::class, $path);
        $this->assertAttributeInstanceOf(ArrayCollection::class, 'operations', $path);
        $this->assertAttributeContainsOnly(Operation::class, 'operations', $path);

        $json = $this->getSerializer()->serialize($path, 'json');

        $this->assertJson($json);
        $this->assertJsonStringEqualsJsonString($data, $json);
    }
}
