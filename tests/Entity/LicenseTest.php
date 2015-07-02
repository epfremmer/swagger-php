<?php
/**
 * File LicenseTest.php
 *
 * @author Edward Pfremmer <epfremme@nerdery.com>
 */
namespace Nerdery\Swagger\Tests\Entity;

use Nerdery\Swagger\Entity\License;
use Nerdery\Swagger\Tests\Mixin\SerializerContextTrait;

/**
 * Class LicenseTest
 *
 * @package Nerdery\Swagger
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
     * @covers Nerdery\Swagger\Entity\License::getName
     * @covers Nerdery\Swagger\Entity\License::setName
     */
    public function testName()
    {
        $this->assertClassHasAttribute('name', License::class);
        $this->assertInstanceOf(License::class, $this->license->setName('foo'));
        $this->assertAttributeEquals('foo', 'name', $this->license);
        $this->assertEquals('foo', $this->license->getName());
    }

    /**
     * @covers Nerdery\Swagger\Entity\License::getUrl
     * @covers Nerdery\Swagger\Entity\License::setUrl
     */
    public function testUrl()
    {
        $this->assertClassHasAttribute('url', License::class);
        $this->assertInstanceOf(License::class, $this->license->setUrl('foo'));
        $this->assertAttributeEquals('foo', 'url', $this->license);
        $this->assertEquals('foo', $this->license->getUrl());
    }

    /**
     * @covers Nerdery\Swagger\Entity\License
     */
    public function testSerialize()
    {
        $data = json_encode([
            'name' => 'foo',
            'url'  => 'bar',
        ]);

        $license = $this->getSerializer()->deserialize($data, License::class, 'json');

        $this->assertInstanceOf(License::class, $license);
        $this->assertAttributeEquals('foo', 'name', $license);
        $this->assertAttributeEquals('bar', 'url', $license);

        $json = $this->getSerializer()->serialize($license, 'json');

        $this->assertJson($json);
        $this->assertJsonStringEqualsJsonString($data, $json);
    }
}
