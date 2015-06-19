<?php
/**
 * File SwaggerFactoryTest.php
 *
 * @author Edward Pfremmer <epfremme@nerdery.com>
 */
namespace ERP\Swagger\Tests\Factory;

use ERP\Swagger\Entity\Swagger;
use ERP\Swagger\Factory\SwaggerFactory;
use ERP\Swagger\Tests\Parser\SwaggerParserTest;

/**
 * Class SwaggerFactoryTest
 *
 * @package ERP\Swagger
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
     * @covers ERP\Swagger\Factory\SwaggerFactory::__construct
     */
    public function testFactoryConstructor()
    {
        $this->assertInstanceOf(SwaggerFactory::class, $this->getFactory());
    }

    /**
     * @expectedException \InvalidArgumentException
     */
    public function testBuildMissing()
    {
        $this->getFactory()->build($this->getFile(SwaggerParserTest::SWAGGER_MISSING_FILE));
    }

    /**
     * @expectedException \ERP\Swagger\Exception\InvalidVersionException
     */
    public function testBuildUnsupportedVersion()
    {
        $this->getFactory()->build($this->getFile(SwaggerParserTest::SWAGGER_V1_FILE));
    }

    /**
     * @covers ERP\Swagger\Factory\SwaggerFactory::build
     */
    public function testBuildJson()
    {
        $swagger = $this->getFactory()->build($this->getFile(SwaggerParserTest::SWAGGER_JSON_FILE));

        $this->assertInstanceOf(Swagger::class, $swagger);
    }

    /**
     * @covers ERP\Swagger\Factory\SwaggerFactory::build
     */
    public function testBuildYaml()
    {
        $swagger = $this->getFactory()->build($this->getFile(SwaggerParserTest::SWAGGER_YAML_FILE));

        $this->assertInstanceOf(Swagger::class, $swagger);
    }

    /**
     * @covers ERP\Swagger\Factory\SwaggerFactory::serialize
     */
    public function testSerialize()
    {
        $swagger = $this->getFactory()->build($this->getFile(SwaggerParserTest::SWAGGER_JSON_FILE));

        $json = $this->getFactory()->serialize($swagger);

        $this->assertJson($json);
        $this->assertJsonStringEqualsJsonString(file_get_contents($this->getFile(SwaggerParserTest::SWAGGER_JSON_FILE)), $json);
    }

    /**
     * @expectedException \ERP\Swagger\Exception\InvalidVersionException
     */
    public function testSerializeUnsupportedVersion()
    {
        $swagger = $this->getFactory()->build($this->getFile(SwaggerParserTest::SWAGGER_JSON_FILE));

        $swagger->setVersion('1.0');

        $this->getFactory()->serialize($swagger);
    }
}
