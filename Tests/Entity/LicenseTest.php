<?php
/**
 * File LicenseTest.php
 *
 * @author Edward Pfremmer <epfremme@nerdery.com>
 */
namespace Epfremmer\SwaggerBundle\Tests\Entity;

use Epfremmer\SwaggerBundle\Entity\License;
use Epfremmer\SwaggerBundle\Tests\Mixin\SerializerContextTrait;

/**
 * Class LicenseTest
 *
 * @package Epfremmer\SwaggerBundle
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
     * @covers Epfremmer\SwaggerBundle\Entity\License::getName
     * @covers Epfremmer\SwaggerBundle\Entity\License::setName
     */
    public function testName()
    {
        $this->assertClassHasAttribute('name', License::class);
        $this->assertInstanceOf(License::class, $this->license->setName('foo'));
        $this->assertAttributeEquals('foo', 'name', $this->license);
        $this->assertEquals('foo', $this->license->getName());
    }

    /**
     * @covers Epfremmer\SwaggerBundle\Entity\License::getUrl
     * @covers Epfremmer\SwaggerBundle\Entity\License::setUrl
     */
    public function testUrl()
    {
        $this->assertClassHasAttribute('url', License::class);
        $this->assertInstanceOf(License::class, $this->license->setUrl('foo'));
        $this->assertAttributeEquals('foo', 'url', $this->license);
        $this->assertEquals('foo', $this->license->getUrl());
    }

    /**
     * @covers Epfremmer\SwaggerBundle\Entity\License
     */
    public function testSerialize()
    {
        $data = json_encode([
            'name' => 'foo',
            'url'  => 'bar',
        ]);

        $license = self::$serializer->deserialize($data, License::class, 'json');

        $this->assertInstanceOf(License::class, $license);
        $this->assertAttributeEquals('foo', 'name', $license);
        $this->assertAttributeEquals('bar', 'url', $license);

        $json = self::$serializer->serialize($license, 'json');

        $this->assertJson($json);
        $this->assertJsonStringEqualsJsonString($data, $json);
    }
}
