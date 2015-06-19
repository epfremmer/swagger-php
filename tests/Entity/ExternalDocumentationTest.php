<?php
/**
 * File ExternalDocumentationTest.php
 *
 * @author Edward Pfremmer <epfremme@nerdery.com>
 */
namespace ERP\Swagger\Tests\Entity;

use ERP\Swagger\Entity\ExternalDocumentation;
use ERP\Swagger\Tests\Mixin\SerializerContextTrait;

/**
 * Class ExternalDocumentationTest
 *
 * @package ERP\Swagger
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
     * @covers ERP\Swagger\Entity\ExternalDocumentation::getDescription
     * @covers ERP\Swagger\Entity\ExternalDocumentation::setDescription
     */
    public function testDescription()
    {
        $this->assertClassHasAttribute('description', ExternalDocumentation::class);
        $this->assertInstanceOf(ExternalDocumentation::class, $this->externalDocumentation->setDescription('foo'));
        $this->assertAttributeEquals('foo', 'description', $this->externalDocumentation);
        $this->assertEquals('foo', $this->externalDocumentation->getDescription());
    }

    /**
     * @covers ERP\Swagger\Entity\ExternalDocumentation::getUrl
     * @covers ERP\Swagger\Entity\ExternalDocumentation::setUrl
     */
    public function testUrl()
    {
        $this->assertClassHasAttribute('url', ExternalDocumentation::class);
        $this->assertInstanceOf(ExternalDocumentation::class, $this->externalDocumentation->setUrl('foo'));
        $this->assertAttributeEquals('foo', 'url', $this->externalDocumentation);
        $this->assertEquals('foo', $this->externalDocumentation->getUrl());
    }

    /**
     * @covers ERP\Swagger\Entity\ExternalDocumentation
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
