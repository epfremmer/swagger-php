<?php
/**
 * File FileParserTest.php
 *
 * @author Edward Pfremmer <epfremme@nerdery.com>
 */
namespace Epfremme\Swagger\Tests\Parser;

use Epfremme\Swagger\Parser\JsonStringParser;
use Epfremme\Swagger\Tests\Factory\SwaggerFactoryTest;

/**
 * Class JsonStringParserTest
 *
 * @package Epfremme\Swagger
 * @subpackage Tests\Parser
 */
class JsonStringParserTest extends \PHPUnit_Framework_TestCase
{

    /**
     * @covers Epfremme\Swagger\Parser\JsonStringParser::__construct
     * @test
     */
    public function shouldLoadValidJsonString()
    {
        $jsonParser = new JsonStringParser(SwaggerFactoryTest::testJsonString);

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
     * @covers Epfremme\Swagger\Parser\JsonStringParser::__construct
     * @test
     */
    public function shouldThrowExceptionOnInvalidData()
    {
        $this->setExpectedException(\InvalidArgumentException::class);

        $jsonParser = new JsonStringParser('');
    }
}
