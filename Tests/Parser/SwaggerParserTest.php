<?php
/**
 * File SwaggerParserTest.php
 *
 * @author Edward Pfremmer <epfremme@nerdery.com>
 */
namespace ERP\Swagger\Tests\Parser;

use ERP\Swagger\Parser\SwaggerParser;

/**
 * Class SwaggerParserTest
 *
 * @package ERP\Swagger
 * @subpackage Tests\Parser
 */
class SwaggerParserTest extends \PHPUnit_Framework_TestCase
{

    // swagger files
    const SWAGGER_JSON_FILE            = 'swagger.json';
    const SWAGGER_YAML_FILE            = 'swagger.yaml';
    const SWAGGER_MISSING_FILE         = 'swagger_missing.json';
    const SWAGGER_WO_VERSION_JSON_FILE = 'swagger_wo_version.json';
    const SWAGGER_WO_VERSION_YAML_FILE = 'swagger_wo_version.yaml';

    /**
     * {@inheritdoc}
     */
    protected function setUp() {}

    /**
     * Return new SwaggerParser
     *
     * @param string $file
     * @return \ERP\Swagger\Parser\SwaggerParser
     */
    protected function getSwagger($file)
    {
        return new SwaggerParser(realpath(__DIR__ . '/../Resources/' . $file));
    }

    /**
     * @expectedException \InvalidArgumentException
     */
    public function testConstructEmptyFileException()
    {
        new SwaggerParser(null);
    }

    /**
     * @expectedException \InvalidArgumentException
     */
    public function testConstructMissingFileException()
    {
        $this->getSwagger(self::SWAGGER_MISSING_FILE);
    }

    /**
     * @covers ERP\Swagger\Parser\SwaggerParser::__construct
     */
    public function testConstructJsonFile()
    {
        $swagger = $this->getSwagger(self::SWAGGER_JSON_FILE);

        $this->assertInstanceOf(SwaggerParser::class, $swagger);
        $this->assertAttributeInternalType('array', 'data', $swagger);
    }

    /**
     * @covers ERP\Swagger\Parser\SwaggerParser::__construct
     */
    public function testConstructYamlFile()
    {
        $swagger = $this->getSwagger(self::SWAGGER_YAML_FILE);

        $this->assertInstanceOf(SwaggerParser::class, $swagger);
        $this->assertAttributeInternalType('array', 'data', $swagger);
    }

    /**
     * @covers ERP\Swagger\Parser\SwaggerParser::getVersion
     * @depends testConstructJsonFile
     */
    public function testGetVersion()
    {
        $swagger = $this->getSwagger(self::SWAGGER_JSON_FILE);

        $this->assertNotEmpty($swagger->getVersion());
        $this->assertEquals('2.0', $swagger->getVersion());
    }

    /**
     * @covers ERP\Swagger\Parser\SwaggerParser::getVersion
     * @depends testConstructJsonFile
     */
    public function testGetMissingVersion()
    {
        $jsonSwagger = $this->getSwagger(self::SWAGGER_WO_VERSION_JSON_FILE);
        $yamlSwagger = $this->getSwagger(self::SWAGGER_WO_VERSION_YAML_FILE);

        $this->assertNotEmpty($jsonSwagger->getVersion());
        $this->assertEquals('2.0', $jsonSwagger->getVersion());
        $this->assertNotEmpty($yamlSwagger->getVersion());
        $this->assertEquals('2.0', $yamlSwagger->getVersion());
    }

    /**
     * @covers ERP\Swagger\Parser\SwaggerParser::getData
     * @depends testConstructJsonFile
     */
    public function testGetData()
    {
        $swagger = $this->getSwagger(self::SWAGGER_JSON_FILE);

        $this->assertNotEmpty($swagger->getData());
        $this->assertInternalType('array', $swagger->getData());
    }

    /**
     * @covers ERP\Swagger\Parser\SwaggerParser::getData
     * @depends testConstructJsonFile
     */
    public function testToString()
    {
        $swagger = $this->getSwagger(self::SWAGGER_JSON_FILE);

        $this->assertNotEmpty((string) $swagger);
        $this->assertInternalType('string', (string)$swagger);
        $this->assertJson((string) $swagger);
    }
}
