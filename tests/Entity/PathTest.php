<?php
/**
 * File PathTest.php
 *
 * @author Edward Pfremmer <epfremme@nerdery.com>
 */
namespace Epfremme\Swagger\Tests\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Epfremme\Swagger\Entity\Operation;
use Epfremme\Swagger\Entity\Parameters;
use Epfremme\Swagger\Entity\Path;
use Epfremme\Swagger\Tests\Mixin\SerializerContextTrait;

/**
 * Class PathTest
 *
 * @package Epfremme\Swagger
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
     * @covers Epfremme\Swagger\Entity\Path::getOperations
     * @covers Epfremme\Swagger\Entity\Path::setOperations
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
     * @covers Epfremme\Swagger\Entity\Path::getVendorExtensions
     * @covers Epfremme\Swagger\Entity\Path::setVendorExtensions
     */
    public function testVendorExtension()
    {
        $this->assertClassHasAttribute('vendorExtensions', Path::class);
        $vendorExtensions = [
            'x-foo' => '1',
            'x-bar' => 'baz'
        ];
        $this->assertInstanceOf(Path::class, $this->path->setVendorExtensions($vendorExtensions));
        $this->assertAttributeEquals($vendorExtensions, 'vendorExtensions', $this->path);
        $this->assertEquals($vendorExtensions, $this->path->getVendorExtensions());
    }

    /**
     * @covers Epfremme\Swagger\Entity\Path
     */
    public function testSerialize()
    {
        $vendorExtensions = [
            'x-foo' => 'bar',
            'x-baz' => ['baz', 'bar']
        ];
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
            'x-foo' => 'bar',
            'x-baz' => ['baz', 'bar']
        ]);

        $path = $this->getSerializer()->deserialize($data, Path::class, 'json');

        $this->assertInstanceOf(Path::class, $path);
        $this->assertAttributeInstanceOf(ArrayCollection::class, 'operations', $path);
        $this->assertAttributeContainsOnly(Operation::class, 'operations', $path);
        $this->assertAttributeEquals($vendorExtensions, 'vendorExtensions', $path);

        $json = $this->getSerializer()->serialize($path, 'json');

        $this->assertJson($json);
        $this->assertJsonStringEqualsJsonString($data, $json);
    }
}
