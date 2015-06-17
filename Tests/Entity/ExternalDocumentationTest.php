<?php
/**
 * File ExternalDocumentationTest.php
 *
 * @author Edward Pfremmer <epfremme@nerdery.com>
 */
namespace Epfremmer\SwaggerBundle\Tests\Entity;

use Epfremmer\SwaggerBundle\Entity\ExternalDocumentation;
use Epfremmer\SwaggerBundle\Tests\Mixin\SerializerContextTrait;

/**
 * Class ExternalDocumentationTest
 *
 * @package Epfremmer\SwaggerBundle
 * @subpackage Tests\Entity
 */
class ExternalDocumentationTest extends \PHPUnit_Framework_TestCase
{
    use SerializerContextTrait;

    /**
     * @var ExternalDocumentation
     */
    protected $externalDocumentation;

    /**
     * {@inheritdoc}
     */
    protected function setUp()
    {
        $this->externalDocumentation = new ExternalDocumentation();
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
    public function testSerialize()
    {
        $data = json_encode([
            'description' => 'foo',
            'url'         => 'bar',
        ]);

        $license = self::$serializer->deserialize($data, ExternalDocumentation::class, 'json');

        $this->assertInstanceOf(ExternalDocumentation::class, $license);
        $this->assertAttributeEquals('foo', 'description', $license);
        $this->assertAttributeEquals('bar', 'url', $license);

        $json = self::$serializer->serialize($license, 'json');

        $this->assertJson($json);
        $this->assertJsonStringEqualsJsonString($data, $json);
    }
}
