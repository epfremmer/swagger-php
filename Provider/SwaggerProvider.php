<?php
/**
 * File SwaggerProvider.php
 *
 * @author Edward Pfremmer <epfremme@nerdery.com>
 */
namespace Epfremmer\SwaggerBundle\Provider;

use Epfremmer\SwaggerBundle\Entity\SwaggerDoc;
use JMS\Serializer\Serializer;
use Symfony\Component\HttpKernel\KernelInterface;
use Symfony\Component\Yaml\Parser as YamlParser;

/**
 * Class SwaggerProvider
 *
 * @package Epfremmer\SwaggerBundle
 * @subpackage Provider
 */
class SwaggerProvider
{

    // default file name if none provided
    const DEFAULT_SWAGGER_FILE = 'swagger.yaml';

    /**
     * @var string
     */
    protected $file;

    /**
     * @var KernelInterface
     */
    protected $kernel;

    /**
     * @var Serializer
     */
    protected $serializer;

    /**
     * @var SwaggerDoc
     */
    protected $swagger;

    /**
     * Constructor
     *
     * @param KernelInterface $kernel
     * @param Serializer $serializer
     * @param string $file
     */
    public function __construct(
        KernelInterface $kernel,
        Serializer $serializer,
        $file = self::DEFAULT_SWAGGER_FILE
    ) {
        $this->file       = $file;
        $this->kernel     = $kernel;
        $this->serializer = $serializer;
    }

    /**
     * Parse & return the swagger doc
     *
     * @return SwaggerDoc
     */
    public function getSwaggerDoc()
    {
        if (!$this->swagger) {
            $parser  = new YamlParser();
            $rootDir = $this->kernel->getRootDir();
            $config  = $parser->parse(file_get_contents($rootDir . '/../' . $this->file));

            $this->swagger = $this->serializer->deserialize(json_encode($config), SwaggerDoc::class, 'json');
        }

        return $this->swagger;
    }
}