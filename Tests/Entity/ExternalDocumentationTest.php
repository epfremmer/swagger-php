<?php
/**
 * File ExternalDocumentationTest.php
 *
 * @author Edward Pfremmer <epfremme@nerdery.com>
 */
namespace Epfremmer\SwaggerBundle\Tests\Entity;

use Epfremmer\SwaggerBundle\Entity\ExternalDocumentation;
use JMS\Serializer\Serializer;
use JMS\Serializer\SerializerBuilder;

/**
 * Class ExternalDocumentationTest
 *
 * @package Epfremmer\SwaggerBundle
 * @subpackage Tests\Entity
 */
class ExternalDocumentationTest extends \PHPUnit_Framework_TestCase
{

    /**
     * @var ExternalDocumentation
     */
    protected $externalDocumentation;

    /**
     * @var Serializer
     */
    protected static $serializer;

    /**
     * {@inheritdoc}
     */
    protected function setUp()
    {
        $this->externalDocumentation = new ExternalDocumentation();
    }

    /**
     * {@inheritdoc}
     */
    public static function setUpBeforeClass()
    {
        self::$serializer = SerializerBuilder::create()->build();
    }

    /**
     * @covers Epfremmer\SwaggerBundle\Entity\ExternalDocumentation::getDescription
     * @covers Epfremmer\SwaggerBundle\Entity\ExternalDocumentation::setDescription
     */
    public function testDescription()
    {
        $this->assertClassHasAttribute('description', ExternalDocumentation::class);
        $this->assertInstanceOf(ExternalDocumentation::class, $this->externalDocumentation->setDescription('foo'));
        $this->assertAttributeEquals('foo', 'description', $this->externalDocumentation);
        $this->assertEquals('foo', $this->externalDocumentation->getDescription());
    }

    /**
     * @covers Epfremmer\SwaggerBundle\Entity\ExternalDocumentation::getUrl
     * @covers Epfremmer\SwaggerBundle\Entity\ExternalDocumentation::setUrl
     */
    public function testUrl()
    {
        $this->assertClassHasAttribute('url', ExternalDocumentation::class);
        $this->assertInstanceOf(ExternalDocumentation::class, $this->externalDocumentation->setUrl('foo'));
        $this->assertAttributeEquals('foo', 'url', $this->externalDocumentation);
        $this->assertEquals('foo', $this->externalDocumentation->getUrl());
    }

    /**
     * @covers Epfremmer\SwaggerBundle\Entity\ExternalDocumentation
     */
    public function testDeserialize()
    {
        $data = json_encode([
            'description' => 'foo',
            'url'         => 'bar',
        ]);

        $license = self::$serializer->deserialize($data, ExternalDocumentation::class, 'json');

        $this->assertInstanceOf(ExternalDocumentation::class, $license);
        $this->assertAttributeEquals('foo', 'description', $license);
        $this->assertAttributeEquals('bar', 'url', $license);
    }
}
