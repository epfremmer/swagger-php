<?php
namespace Epfremme\Swagger\Parser;

/**
 * Class JsonStringParser
 * @package Epfremme\Swagger\Parser
 */
class JsonStringParser extends SwaggerParser
{

    /**
     * FileParser constructor.
     * @param string $jsonString
     * @throws \InvalidArgumentException
     */
    public function __construct($jsonString)
    {
        if (empty($jsonString)) {
            throw new \InvalidArgumentException(
                sprintf("Json string cannot be empty")
            );
        }

        $this->data = $this->parse($jsonString);

    }

    /**
     * @param string $jsonString
     * @return array
     * @throws \InvalidArgumentException
     */
    protected function parse($jsonString)
    {
        $data = json_decode($jsonString, true);

        if (false === $data) {
            throw new \InvalidArgumentException(
                sprintf("Json string cannot be decoded, error: " . json_last_error_msg())
            );
        }

        return $data;
    }
}