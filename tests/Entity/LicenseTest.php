<?php
/**
 * File LicenseTest.php
 *
 * @author Edward Pfremmer <epfremme@nerdery.com>
 */
namespace Epfremme\Swagger\Tests\Entity;

use Epfremme\Swagger\Entity\License;
use Epfremme\Swagger\Tests\Mixin\SerializerContextTrait;

/**
 * Class LicenseTest
 *
 * @package Epfremme\Swagger
 * @subpackage Tests\Entity
 */
class LicenseTest extends \PHPUnit_Framework_TestCase
{
    use SerializerContextTrait;

    /**
     * @var License
     */
    protected $license;

    /**
     * {@inheritdoc}
     */
    protected function setUp()
    {
        $this->license = new License();
    }

    /**
     * @covers Epfremme\Swagger\Entity\License::getName
     * @covers Epfremme\Swagger\Entity\License::setName
     */
    public function testName()
    {
        $this->assertClassHasAttribute('name', License::class);
        $this->assertInstanceOf(License::class, $this->license->setName('foo'));
        $this->assertAttributeEquals('foo', 'name', $this->license);
        $this->assertEquals('foo', $this->license->getName());
    }

    /**
     * @covers Epfremme\Swagger\Entity\License::getUrl
     * @covers Epfremme\Swagger\Entity\License::setUrl
     */
    public function testUrl()
    {
        $this->assertClassHasAttribute('url', License::class);
        $this->assertInstanceOf(License::class, $this->license->setUrl('foo'));
        $this->assertAttributeEquals('foo', 'url', $this->license);
        $this->assertEquals('foo', $this->license->getUrl());
    }

    /**
     * @covers Epfremme\Swagger\Entity\License::getVendorExtensions
     * @covers Epfremme\Swagger\Entity\License::setVendorExtensions
     */
    public function testVendorExtension()
    {
        $this->assertClassHasAttribute('vendorExtensions', License::class);
        $vendorExtensions = [
            'x-foo' => '1',
            'x-bar' => 'baz'
        ];
        $this->assertInstanceOf(License::class, $this->license->setVendorExtensions($vendorExtensions));
        $this->assertAttributeEquals($vendorExtensions, 'vendorExtensions', $this->license);
        $this->assertEquals($vendorExtensions, $this->license->getVendorExtensions());
    }

    /**
     * @covers Epfremme\Swagger\Entity\License
     */
    public function testSerialize()
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
