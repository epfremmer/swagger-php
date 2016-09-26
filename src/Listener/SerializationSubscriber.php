<?php
/**
 * File SerializationSubscriber.php
 *
 * @author Edward Pfremmer <epfremme@nerdery.com>
 */
namespace Epfremme\Swagger\Listener;

use Doctrine\Common\Annotations\AnnotationReader;
use Epfremme\Swagger\Annotations\Discriminator;
use Epfremme\Swagger\Entity\Examples;
use Epfremme\Swagger\Entity\Headers\AbstractHeader;
use Epfremme\Swagger\Entity\Parameters\AbstractParameter;
use Epfremme\Swagger\Entity\Parameters\RefParameter;
use Epfremme\Swagger\Entity\Path;
use Epfremme\Swagger\Entity\Schemas\AbstractSchema;
use Epfremme\Swagger\Entity\Schemas\MultiSchema;
use Epfremme\Swagger\Entity\Schemas\RefSchema;
use JMS\Serializer\EventDispatcher\Events;
use JMS\Serializer\EventDispatcher\PreDeserializeEvent;
use JMS\Serializer\EventDispatcher\EventSubscriberInterface;
use JMS\Serializer\EventDispatcher\PreSerializeEvent;

/**
 * Class SerializationSubscriber
 *
 * @package Epfremme\Swagger
 * @subpackage Listener
 */
class SerializationSubscriber implements EventSubscriberInterface
{
    /**
     * @var AnnotationReader
     */
    protected $reader;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->reader = new AnnotationReader();
    }

    /**
     * {@inheritdoc
     */
    public static function getSubscribedEvents()
    {
        return [
            // serialization listeners (fix object types before JMS discriminator mapping)
            ['event' => Events::PRE_SERIALIZE, 'class' => AbstractSchema::class, 'method' => 'onPreSerialize'],
            ['event' => Events::PRE_SERIALIZE, 'class' => AbstractHeader::class, 'method' => 'onPreSerialize'],
            ['event' => Events::PRE_SERIALIZE, 'class' => AbstractParameter::class, 'method' => 'onPreSerialize'],

            // deserialization listeners (prepare data types for proper deserialization)
            ['event' => Events::PRE_DESERIALIZE, 'class' => Path::class, 'method' => 'onPreDeserializeCollection'],
            ['event' => Events::PRE_DESERIALIZE, 'class' => Examples::class, 'method' => 'onPreDeserializeCollection'],
            ['event' => Events::PRE_DESERIALIZE, 'class' => AbstractSchema::class, 'method' => 'onSchemaPreDeserialize'],
            ['event' => Events::PRE_DESERIALIZE, 'class' => AbstractParameter::class, 'method' => 'onParameterPreDeserialize'],

            // discriminator deserialization listener (must be execute last)
            ['event' => Events::PRE_DESERIALIZE, 'method' => 'onPreDeserialize'],
        ];
    }

    /**
     * Fix event type abstract class names
     *
     * JMS uses the actual object class name to properly map the discriminator field back
     * to the serialized object. Abstract class names in the event type will drop the discriminator
     * field during serialization
     *
     * This is caused by a discriminator mapped class inside an Array or Collection
     *
     * @param PreSerializeEvent $event
     */
    public function onPreSerialize(PreSerializeEvent $event)
    {
        $event->setType(get_class($event->getObject()));
    }

    /**
     * Checks for the existence of a discriminator annotation and sets the
     * corresponding mapped deserialization class
     *
     * @param PreDeserializeEvent $event
     */
    public function onPreDeserialize(PreDeserializeEvent $event)
    {
        $class = $event->getType()['name'];

        if (!class_exists($class)) {
            return; // skip custom JMS types
        }

        $data   = $event->getData();
        $object = new \ReflectionClass($class);

        $discriminator = $this->reader->getClassAnnotation($object, Discriminator::class);

        if ($discriminator) {
            $event->setType($discriminator->getClass($data));
        }
    }

    /**
     * Catches special $ref type schema objects during deserialization
     * and sets the correct schema entity type
     *
     * This is because $ref schema objects do not have a "type" field
     * specified in their json spec
     *
     * @param PreDeserializeEvent $event
     */
    public function onSchemaPreDeserialize(PreDeserializeEvent $event)
    {
        $data = $event->getData();

        if (array_key_exists('type', $data) && is_array($data['type'])) {
            $event->setType(MultiSchema::class);
        }

        if (array_key_exists('$ref', $data)) {
            $event->setType(RefSchema::class);
        }
    }

    /**
     * Set custom composite discriminator key based on multiple parameter fields
     * before deserialization to ensure proper discrimination mapping
     *
     * @param PreDeserializeEvent $event
     */
    public function onParameterPreDeserialize(PreDeserializeEvent $event)
    {
        $data = $event->getData();

        if (array_key_exists('$ref', $data)) {
            $event->setType(RefParameter::class);
            return;
        }

        $data['class'] = $data['in'];

        if (array_key_exists('type', $data)) {
            $data['class'] = sprintf('%s.%s', $data['in'], $data['type']);
        }

        $event->setData($data);
    }

    /**
     * Set top level data key when deserializing inline collections
     *
     * @param PreDeserializeEvent $event
     */
    public function onPreDeserializeCollection(PreDeserializeEvent $event)
    {
        $data = $event->getData();

        $event->setData([
            'data' => $data
        ]);
    }
}
