<?php
/**
 * File SwaggerParserTest.php
 *
 * @author Edward Pfremmer <epfremme@nerdery.com>
 */
namespace Epfremmer\SwaggerBundle\Tests\Parser;

use Epfremmer\SwaggerBundle\Parser\SwaggerParser;

/**
 * Class SwaggerParserTest
 *
 * @package Epfremmer\SwaggerBundle
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
     * @return \Epfremmer\SwaggerBundle\Parser\SwaggerParser
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
     * @covers Epfremmer\SwaggerBundle\Parser\SwaggerParser::__construct
     */
    public function testConstructJsonFile()
    {
        $swagger = $this->getSwagger(self::SWAGGER_JSON_FILE);

        $this->assertInstanceOf(SwaggerParser::class, $swagger);
        $this->assertAttributeInternalType('array', 'data', $swagger);
    }

    /**
     * @covers Epfremmer\SwaggerBundle\Parser\SwaggerParser::__construct
     */
    public function testConstructYamlFile()
    {
        $swagger = $this->getSwagger(self::SWAGGER_YAML_FILE);

        $this->assertInstanceOf(SwaggerParser::class, $swagger);
        $this->assertAttributeInternalType('array', 'data', $swagger);
    }

    /**
     * @covers Epfremmer\SwaggerBundle\Parser\SwaggerParser::getVersion
     * @depends testConstructJsonFile
     */
    public function testGetVersion()
    {
        $swagger = $this->getSwagger(self::SWAGGER_JSON_FILE);

        $this->assertNotEmpty($swagger->getVersion());
        $this->assertEquals('2.0', $swagger->getVersion());
    }

    /**
     * @covers Epfremmer\SwaggerBundle\Parser\SwaggerParser::getVersion
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
     * @covers Epfremmer\SwaggerBundle\Parser\SwaggerParser::getData
     * @depends testConstructJsonFile
     */
    public function testGetData()
    {
        $swagger = $this->getSwagger(self::SWAGGER_JSON_FILE);

        $this->assertNotEmpty($swagger->getData());
        $this->assertInternalType('array', $swagger->getData());
    }

    /**
     * @covers Epfremmer\SwaggerBundle\Parser\SwaggerParser::getData
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
