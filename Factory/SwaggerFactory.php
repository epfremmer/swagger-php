<?php
/**
 * File SwaggerFactory.php
 *
 * @author Edward Pfremmer <epfremme@nerdery.com>
 */
namespace ERP\Swagger\Factory;

use ERP\Swagger\Entity\Swagger;
use ERP\Swagger\Parser\SwaggerParser;
use JMS\Serializer\DeserializationContext;
use JMS\Serializer\SerializationContext;
use JMS\Serializer\Serializer;
use JMS\Serializer\SerializerBuilder;
use JMS\Serializer\EventDispatcher\EventDispatcher;
use ERP\Swagger\Listener\SerializationSubscriber;

/**
 * Class SwaggerFactory
 *
 * @package ERP\Swagger
 * @subpackage Factory
 */
class SwaggerFactory
{

    /**
     * @var Serializer
     */
    protected $serializer;

    /**
     * Constructor
     */
    public function __construct()
    {
        $serializerBuilder = new SerializerBuilder();

        $serializerBuilder->configureListeners(function(EventDispatcher $eventDispatcher) {
            $eventDispatcher->addSubscriber(new SerializationSubscriber());
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
        $swagger = new SwaggerParser($file);
        $context = new DeserializationContext();

        $context->setVersion(
            $swagger->getVersion()
        );

        return $this->serializer->deserialize($swagger, Swagger::class, 'json', $context);
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
}