<?php
/**
 * File FileParserTest.php
 *
 * @author Edward Pfremmer <epfremme@nerdery.com>
 */
namespace Epfremme\Swagger\Tests\Parser;

use Epfremme\Swagger\Parser\JsonStringParser;

/**
 * Class JsonStringParserTest
 *
 * @package Epfremme\Swagger
 * @subpackage Tests\Parser
 */
class JsonStringParserTest extends \PHPUnit_Framework_TestCase
{
    const TEST_JSON_STRING = '{"swaggerVersion": "1.2","apis": [{"path": "http://localhost:8000/listings/greetings","description": "Generating greetings in our application."}]}';

    /**
     * @covers \Epfremme\Swagger\Parser\JsonStringParser::__construct
     * @covers \Epfremme\Swagger\Parser\JsonStringParser::parse
     */
    public function testLoadValidJsonString()
    {
        $jsonParser = new JsonStringParser(self::TEST_JSON_STRING);

        $data = $jsonParser->getData();

        static::assertEquals(
            [
                'swaggerVersion' => '1.2',
                'apis' => [
                    [
                        'path' => 'http://localhost:8000/listings/greetings',
                        'description' => 'Generating greetings in our application.'
                    ]
                ]
            ],
            $data
        );
    }

    /**
     * @covers \Epfremme\Swagger\Parser\JsonStringParser::__construct
     * @expectedException \InvalidArgumentException
     */
    public function testInvalidDataException()
    {
        new JsonStringParser('');
    }

    /**
     * @covers \Epfremme\Swagger\Parser\JsonStringParser::__construct
     * @covers \Epfremme\Swagger\Parser\JsonStringParser::parse
     * @expectedException \InvalidArgumentException
     */
    public function testInvalidJsonException()
    {
        $jsonParser = new JsonStringParser('{"foo": __UNEXPECTED_END__');
        $jsonParser->getData();
    }
}
