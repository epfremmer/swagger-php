<?php
/**
 * File SwaggerFactoryTest.php
 *
 * @author Edward Pfremmer <epfremme@nerdery.com>
 */
namespace Epfremme\Swagger\Tests\Factory;

use JMS\Serializer\Serializer;
use Epfremme\Swagger\Entity\Swagger;
use Epfremme\Swagger\Factory\SwaggerFactory;
use Epfremme\Swagger\Tests\Parser\FileParserTest;

/**
 * Class SwaggerFactoryTest
 *
 * @package Epfremme\Swagger
 * @subpackage Tests\Parser
 */
class SwaggerFactoryTest extends \PHPUnit_Framework_TestCase
{
    const testJsonString = '{"swaggerVersion": "1.2","apis": [{"path": "http://localhost:8000/listings/greetings","description": "Generating greetings in our application."}]}';
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
        if (!self::$factory) {
            self::setUpBeforeClass();
        }

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
     * @covers Epfremme\Swagger\Factory\SwaggerFactory::__construct
     */
    public function testFactoryConstructor()
    {
        $factory = new SwaggerFactory();

        $this->assertInstanceOf(SwaggerFactory::class, $factory);
        $this->assertAttributeInstanceOf(Serializer::class, 'serializer', $factory);
    }

    /**
     * @expectedException \InvalidArgumentException
     */
    public function testBuildMissing()
    {
        $this->getFactory()->build($this->getFile(FileParserTest::SWAGGER_MISSING_FILE));
    }

    /**
     * @expectedException \Epfremme\Swagger\Exception\InvalidVersionException
     */
    public function testBuildUnsupportedVersion()
    {
        $this->getFactory()->build($this->getFile(FileParserTest::SWAGGER_V1_FILE));
    }

    /**
     * @covers Epfremme\Swagger\Factory\SwaggerFactory::build
     */
    public function testBuildJson()
    {
        $swagger = $this->getFactory()->build($this->getFile(FileParserTest::SWAGGER_JSON_FILE));

        $this->assertInstanceOf(Swagger::class, $swagger);
    }

    /**
     * @covers Epfremme\Swagger\Factory\SwaggerFactory::buildFromJsonString
     */
    public function testBuildFromJsonString()
    {
        $swagger = $this->getFactory()->buildFromJsonString(
            self::testJsonString
        );

        $this->assertInstanceOf(Swagger::class, $swagger);
    }

    /*public function testFactoryConstructorWithSubscribers()
    {
        $testEventSubscriber = new TestEventSubscriber();
        $factory = new SwaggerFactory([
            $testEventSubscriber
        ]);

        $factory->build($this->getFile(SwaggerParserTest::SWAGGER_JSON_FILE));

        $this->assertTrue($testEventSubscriber->isTestFlag());
    }*/

    /**
     * @covers Epfremme\Swagger\Factory\SwaggerFactory::build
     */
    public function testBuildYaml()
    {
        $swagger = $this->getFactory()->build($this->getFile(FileParserTest::SWAGGER_YAML_FILE));

        $this->assertInstanceOf(Swagger::class, $swagger);
    }

    /**
     * @covers Epfremme\Swagger\Factory\SwaggerFactory::serialize
     */
    public function testSerialize()
    {
        $swagger = $this->getFactory()->build($this->getFile(FileParserTest::SWAGGER_JSON_FILE));

        $json = $this->getFactory()->serialize($swagger);

        $this->assertJson($json);
        $this->assertJsonStringEqualsJsonString(
            file_get_contents($this->getFile(FileParserTest::SWAGGER_JSON_FILE)),
            $json
        );
    }

    /**
     * @expectedException \Epfremme\Swagger\Exception\InvalidVersionException
     */
    public function testSerializeUnsupportedVersion()
    {
        $swagger = $this->getFactory()->build($this->getFile(FileParserTest::SWAGGER_JSON_FILE));

        $swagger->setVersion('1.0');

        $this->getFactory()->serialize($swagger);
    }
}
