<?php
/**
 * File SerializationSubscriber.php
 *
 * @author Edward Pfremmer <epfremme@nerdery.com>
 */
namespace Epfremmer\SwaggerBundle\Listener;

use Epfremmer\SwaggerBundle\Entity\Examples;
use Epfremmer\SwaggerBundle\Entity\Headers\AbstractHeader;
use Epfremmer\SwaggerBundle\Entity\Parameters\AbstractParameter;
use Epfremmer\SwaggerBundle\Entity\Path;
use Epfremmer\SwaggerBundle\Entity\Schemas\AbstractSchema;
use JMS\Serializer\EventDispatcher\Events;
use JMS\Serializer\EventDispatcher\PreDeserializeEvent;
use JMS\Serializer\EventDispatcher\EventSubscriberInterface;
use JMS\Serializer\EventDispatcher\PreSerializeEvent;

/**
 * Class SerializationSubscriber
 *
 * @package Epfremmer\SwaggerBundle
 * @subpackage Listener
 */
class SerializationSubscriber implements EventSubscriberInterface
{

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
            ['event' => Events::PRE_DESERIALIZE, 'class' => Path::class, 'method' => 'onPreDeserialize'],
            ['event' => Events::PRE_DESERIALIZE, 'class' => Examples::class, 'method' => 'onPreDeserialize'],
            ['event' => Events::PRE_DESERIALIZE, 'class' => AbstractSchema::class, 'method' => 'onSchemaPreDeserialize'],
            ['event' => Events::PRE_DESERIALIZE, 'class' => AbstractHeader::class, 'method' => 'onSchemaPreDeserialize'],
            ['event' => Events::PRE_DESERIALIZE, 'class' => AbstractParameter::class, 'method' => 'onParameterPreDeserialize'],
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
     * Set top level data key when deserializing
     * inline collections
     *
     * @param PreDeserializeEvent $event
     */
    public function onPreDeserialize(PreDeserializeEvent $event)
    {
        $data = $event->getData();

        $event->setData([
            'data' => $data
        ]);
    }

    /**
     * Set default schema type if none preset
     *
     * @param PreDeserializeEvent $event
     */
    public function onSchemaPreDeserialize(PreDeserializeEvent $event)
    {
        $data = $event->getData();
        $data = $this->normalizeSchemaType($data);

        $event->setData($data);
    }

    /**
     * Set default parameter schema type if none preset
     *
     * @param PreDeserializeEvent $event
     */
    public function onParameterPreDeserialize(PreDeserializeEvent $event)
    {
        $data = $event->getData();

        if (array_key_exists('type', $data)) {var_dump($data);
            $data['in'] .= '.' . $data['type'];
        }

        if (array_key_exists('schema', $data)) {
            $schema = $this->normalizeSchemaType($data['schema']);

            $data['schema'] = $schema;
        }

        $event->setData($data);
    }

    /**
     * Return schema data with required deserialization type values
     *
     * Used by JMS Serializer to map schema type to
     * the corresponding schema class
     *
     * @param array $data
     * @return array
     */
    protected function normalizeSchemaType(array $data)
    {
        switch (true) {
            case array_key_exists('$ref', $data):
                $data['type'] = AbstractSchema::REF_TYPE;
                break;
            case !array_key_exists('type', $data):
                $data['type'] = AbstractSchema::OBJECT_TYPE;
                break;
        }

        return $data;
    }
}