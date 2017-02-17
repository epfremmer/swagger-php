<?php
/**
 * File VendorExtensionsTraitTest.php
 *
 * @author Edward Pfremmer <epfremme@nerdery.com>
 */
namespace Epfremme\Swagger\Tests\Entity\Mixin;

use Epfremme\Swagger\Entity\License;
use Epfremme\Swagger\Entity\Mixin\VendorExtensionsTrait;
use Epfremme\Swagger\Tests\Mixin\SerializerContextTrait;

/**
 * Class VendorExtensionsTraitTest
 *
 * @package Epfremme\Swagger\Tests\Entity\Mixin
 */
class VendorExtensionsTraitTest extends \PHPUnit_Framework_TestCase
{
    use SerializerContextTrait;

    /**
     * @var VendorExtensionsTrait|\PHPUnit_Framework_MockObject_MockObject
     */
    protected $mockTrait;

    /**
     * Mock Classname
     * @var string
     */
    protected $mockClass;

    /**
     * {@inheritdoc}
     */
    protected function setUp()
    {
        $this->mockTrait = $this->getMockForTrait(VendorExtensionsTrait::class);
        $this->mockClass = get_class($this->mockTrait);
    }

    /**
     * @covers \Epfremme\Swagger\Entity\Mixin\VendorExtensionsTrait::getVendorExtensions
     * @covers \Epfremme\Swagger\Entity\Mixin\VendorExtensionsTrait::setVendorExtensions
     * @covers \Epfremme\Swagger\Entity\Mixin\VendorExtensionsTrait::getNullVendorExtensions
     */
    public function testVendorExtensions()
    {
        $this->assertClassHasAttribute('vendorExtensions', $this->mockClass);
        $this->assertInstanceOf($this->mockClass, $this->mockTrait->setVendorExtensions(['x-foo' => 'bar']));
        $this->assertAttributeInternalType('array', 'vendorExtensions', $this->mockTrait);
        $this->assertAttributeEquals(['x-foo' => 'bar'], 'vendorExtensions', $this->mockTrait);
        $this->assertEquals(['x-foo' => 'bar'], $this->mockTrait->getVendorExtensions());
        $this->assertNull($this->mockTrait->getNullVendorExtensions());
    }

    /**
     * @covers \Epfremme\Swagger\Entity\Mixin\VendorExtensionsTrait
     */
    public function testSerialization()
    {
        $vendorExtensions = [
            'x-foo' => 'bar',
            'x-baz' => ['baz', 'bar']
        ];
        $data = json_encode([
            'name' => 'foo',
            'url'  => 'bar',
            'x-foo' => 'bar',
            'x-baz' => ['baz', 'bar']
        ]);

        $license = $this->getSerializer()->deserialize($data, License::class, 'json');

        $this->assertInstanceOf(License::class, $license);
        $this->assertAttributeEquals('foo', 'name', $license);
        $this->assertAttributeEquals('bar', 'url', $license);
        $this->assertAttributeEquals($vendorExtensions, 'vendorExtensions', $license);

        $json = $this->getSerializer()->serialize($license, 'json');

        $this->assertJson($json);
        $this->assertJsonStringEqualsJsonString($data, $json);
    }
}