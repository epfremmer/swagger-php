<?php
/**
 * File SwaggerFactory.php
 *
 * @author Edward Pfremmer <epfremme@nerdery.com>
 */
namespace Epfremme\Swagger\Factory;

use Epfremme\Swagger\Entity\Swagger;
use Epfremme\Swagger\Parser\FileParser;
use Epfremme\Swagger\Parser\JsonStringParser;
use Epfremme\Swagger\Listener\VendorExtensionListener;
use Epfremme\Swagger\Parser\SwaggerParser;
use JMS\Serializer\DeserializationContext;
use JMS\Serializer\SerializationContext;
use JMS\Serializer\Serializer;
use JMS\Serializer\SerializerBuilder;
use JMS\Serializer\EventDispatcher\EventDispatcher;
use Epfremme\Swagger\Listener\SerializationSubscriber;

/**
 * Class SwaggerFactory
 *
 * @package Epfremme\Swagger
 * @subpackage Factory
 */
class SwaggerFactory
{
    /**
     * @var Serializer
     */
    protected $serializer;


    /**
     * SwaggerFactory constructor
     *
     * @param array|null $subscribers
     */
    public function __construct(array $subscribers = [])
    {
        $serializerBuilder = new SerializerBuilder();

        $serializerBuilder->configureListeners(function (EventDispatcher $eventDispatcher) use ($subscribers) {
            $eventDispatcher->addSubscriber(new SerializationSubscriber());
            $eventDispatcher->addSubscriber(new VendorExtensionListener());

            foreach ($subscribers as $subscriber) {
                $eventDispatcher->addSubscriber($subscriber);
            }
        });

        $this->serializer = $serializerBuilder->build();
    }


    /**
     * Build Swagger document from parser interface
     *
     * @param string $file
     * @return Swagger
     */
    public function build($file)
    {
        $parser = new FileParser($file);

        return $this->buildFromParser($parser);
    }

    /**
     * Build Swagger document from parser interface
     *
     * @param string $json
     * @return Swagger
     */
    public function buildFromJsonString($json)
    {
        $parser = new JsonStringParser($json);

        return $this->buildFromParser($parser);
    }

    /**
     * Return serialized Swagger document
     *
     * @param Swagger $swagger
     * @return string
     */
    public function serialize(Swagger $swagger)
    {
        $context = new SerializationContext();

        $context->setVersion(
            $swagger->getVersion()
        );

        return $this->serializer->serialize($swagger, 'json', $context);
    }

    /**
     * Return de-serialized Swagger result
     *
     * @param SwaggerParser $parser
     * @return Swagger
     * @throws \LogicException
     */
    private function buildFromParser(SwaggerParser $parser)
    {
        $context = new DeserializationContext();

        $context->setVersion(
            $parser->getVersion()
        );

        return $this->serializer->deserialize($parser, Swagger::class, 'json', $context);
    }
}
