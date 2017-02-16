<?php
namespace Epfremme\Swagger\Parser;

use Symfony\Component\Yaml\Yaml;

/**
 * Class FileParser
 * @package Epfremme\Swagger\Parser
 */
class FileParser extends SwaggerParser
{

    /**
     * Constructor
     */
    public function __construct($file)
    {
        if (!file_exists($file)) {
            throw new \InvalidArgumentException(
                sprintf("file '%s' doesn't exist", $file)
            );
        }

        $this->data = $this->parse($file);

    }

    /**
     * Parse the swagger file
     *
     * @param string $file - fully qualified file path
     * @return array
     */
    protected function parse($file)
    {
        $data = json_decode(file_get_contents($file), true) ?: Yaml::parse(file_get_contents($file));

        return $data;
    }
}