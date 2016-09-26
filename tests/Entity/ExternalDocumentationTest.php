<?php
/**
 * File ExternalDocumentationTest.php
 *
 * @author Edward Pfremmer <epfremme@nerdery.com>
 */
namespace Epfremme\Swagger\Tests\Entity;

use Epfremme\Swagger\Entity\ExternalDocumentation;
use Epfremme\Swagger\Tests\Mixin\SerializerContextTrait;

/**
 * Class ExternalDocumentationTest
 *
 * @package Epfremme\Swagger
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
     * @covers Epfremme\Swagger\Entity\ExternalDocumentation::getDescription
     * @covers Epfremme\Swagger\Entity\ExternalDocumentation::setDescription
     */
    public function testDescription()
    {
        $this->assertClassHasAttribute('description', ExternalDocumentation::class);
        $this->assertInstanceOf(ExternalDocumentation::class, $this->externalDocumentation->setDescription('foo'));
        $this->assertAttributeEquals('foo', 'description', $this->externalDocumentation);
        $this->assertEquals('foo', $this->externalDocumentation->getDescription());
    }

    /**
     * @covers Epfremme\Swagger\Entity\ExternalDocumentation::getUrl
     * @covers Epfremme\Swagger\Entity\ExternalDocumentation::setUrl
     */
    public function testUrl()
    {
        $this->assertClassHasAttribute('url', ExternalDocumentation::class);
        $this->assertInstanceOf(ExternalDocumentation::class, $this->externalDocumentation->setUrl('foo'));
        $this->assertAttributeEquals('foo', 'url', $this->externalDocumentation);
        $this->assertEquals('foo', $this->externalDocumentation->getUrl());
    }

    /**
     * @covers Epfremme\Swagger\Entity\ExternalDocumentation
     */
    public function testSerialize()
    {
        $data = json_encode([
            'description' => 'foo',
            'url'         => 'bar',
        ]);

        $license = $this->getSerializer()->deserialize($data, ExternalDocumentation::class, 'json');

        $this->assertInstanceOf(ExternalDocumentation::class, $license);
        $this->assertAttributeEquals('foo', 'description', $license);
        $this->assertAttributeEquals('bar', 'url', $license);

        $json = $this->getSerializer()->serialize($license, 'json');

        $this->assertJson($json);
        $this->assertJsonStringEqualsJsonString($data, $json);
    }
}
