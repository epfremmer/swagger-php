<?php
/**
 * File LicenseTest.php
 *
 * @author Edward Pfremmer <epfremme@nerdery.com>
 */
namespace Epfremmer\SwaggerBundle\Tests\Entity;

use Epfremmer\SwaggerBundle\Entity\License;
use JMS\Serializer\Serializer;
use JMS\Serializer\SerializerBuilder;

/**
 * Class LicenseTest
 *
 * @package Epfremmer\SwaggerBundle
 * @subpackage Tests\Entity
 */
class LicenseTest extends \PHPUnit_Framework_TestCase
{

    /**
     * @var License
     */
    protected $license;

    /**
     * @var Serializer
     */
    protected static $serializer;

    /**
     * {@inheritdoc}
     */
    protected function setUp()
    {
        $this->license = new License();
    }

    /**
     * {@inheritdoc}
     */
    public static function setUpBeforeClass()
    {
        self::$serializer = SerializerBuilder::create()->build();
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
    public function testDeserialize()
    {
        $data = json_encode([
            'name' => 'foo',
            'url'  => 'bar',
        ]);

        $license = self::$serializer->deserialize($data, License::class, 'json');

        $this->assertInstanceOf(License::class, $license);
        $this->assertAttributeEquals('foo', 'name', $license);
        $this->assertAttributeEquals('bar', 'url', $license);
    }
}
