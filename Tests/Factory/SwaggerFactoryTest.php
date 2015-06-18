<?php
/**
 * File SwaggerFactoryTest.php
 *
 * @author Edward Pfremmer <epfremme@nerdery.com>
 */
namespace Epfremmer\SwaggerBundle\Tests\Factory;

use Epfremmer\SwaggerBundle\Entity\Swagger;
use Epfremmer\SwaggerBundle\Factory\SwaggerFactory;
use Epfremmer\SwaggerBundle\Tests\Parser\SwaggerParserTest;

/**
 * Class SwaggerFactoryTest
 *
 * @package Epfremmer\SwaggerBundle
 * @subpackage Tests\Parser
 */
class SwaggerFactoryTest extends \PHPUnit_Framework_TestCase
{

    /**
     * @var SwaggerFactory
     */
    protected static $factory;

    /**
     * {@inheritdoc}
     */
    public static function setUpBeforeClass()
    {
        self::$factory = new SwaggerFactory();
    }

    /**
     * Return the swagger factory
     *
     * @return SwaggerFactory
     */
    public function getFactory()
    {
        if (!self::$factory) self::setUpBeforeClass();

        return self::$factory;
    }

    /**
     * Return full file path
     *
     * @param string $filename
     * @return string
     */
    protected function getFile($filename)
    {
        return realpath(__DIR__ . '/../Resources/' . $filename);
    }

    /**
     * @expectedException \InvalidArgumentException
     */
    public function testBuildMissing()
    {
        $this->getFactory()->build($this->getFile(SwaggerParserTest::SWAGGER_MISSING_FILE));
    }

    /**
     * @covers Epfremmer\SwaggerBundle\Factory\SwaggerFactory::build
     */
    public function testBuildJson()
    {
        $swagger = $this->getFactory()->build($this->getFile(SwaggerParserTest::SWAGGER_JSON_FILE));

        $this->assertInstanceOf(Swagger::class, $swagger);
    }

    /**
     * @covers Epfremmer\SwaggerBundle\Factory\SwaggerFactory::build
     */
    public function testBuildYaml()
    {
        $swagger = $this->getFactory()->build($this->getFile(SwaggerParserTest::SWAGGER_YAML_FILE));

        $this->assertInstanceOf(Swagger::class, $swagger);
    }

    /**
     * @covers Epfremmer\SwaggerBundle\Factory\SwaggerFactory::serialize
     */
    public function testSerialize()
    {
        $swagger = $this->getFactory()->build($this->getFile(SwaggerParserTest::SWAGGER_JSON_FILE));

        $json = $this->getFactory()->serialize($swagger);

        $this->assertJson($json);
        $this->assertJsonStringEqualsJsonString(file_get_contents($this->getFile(SwaggerParserTest::SWAGGER_JSON_FILE)), $json);
    }
}
