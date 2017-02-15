<?php
namespace Epfremme\Swagger\Listener;

use Epfremme\Swagger\Entity\ExternalDocumentation;
use Epfremme\Swagger\Entity\Headers\AbstractHeader;
use Epfremme\Swagger\Entity\Info;
use Epfremme\Swagger\Entity\License;
use Epfremme\Swagger\Entity\Operation;
use Epfremme\Swagger\Entity\Parameters\AbstractParameter;
use Epfremme\Swagger\Entity\Path;
use Epfremme\Swagger\Entity\Response;
use Epfremme\Swagger\Entity\Schemas\AbstractSchema;
use Epfremme\Swagger\Entity\SecurityDefinition;
use Epfremme\Swagger\Entity\Tag;
use JMS\Serializer\EventDispatcher\Events;
use JMS\Serializer\EventDispatcher\EventSubscriberInterface;
use JMS\Serializer\EventDispatcher\ObjectEvent;
use JMS\Serializer\EventDispatcher\PreDeserializeEvent;
use JMS\Serializer\GenericSerializationVisitor;

/**
 * Class VendorExtensionListener
 * @package Epfremme\Swagger\Listener
 */
class VendorExtensionListener implements EventSubscriberInterface
{
    /**
     * @return array
     */
    public static function getSubscribedEvents()
    {
        return [
            ['event' => Events::PRE_DESERIALIZE, 'method' => 'onDePreSerialize'],
            ['event' => Events::POST_SERIALIZE, 'method' => 'onPostSerialize'],
        ];
    }

    /**
     * @param PreDeserializeEvent $event
     */
    public function onDePreSerialize(PreDeserializeEvent $event)
    {
        if ($this->checkExpectedType($event, Info::class) ||
            $this->checkExpectedType($event, Response::class) ||
            $this->checkExpectedType($event, Operation::class) ||
            $this->checkExpectedType($event, Tag::class) ||
            $this->checkExpectedType($event, License::class) ||
            $this->checkExpectedType($event, ExternalDocumentation::class) ||
            $this->checkExpectedType($event, SecurityDefinition::class) ||
            $this->checkTypeParent($event, AbstractParameter::class) ||
            $this->checkTypeParent($event, AbstractSchema::class) ||
            $this->checkTypeParent($event, AbstractHeader::class)
        ) {
            $this->updateDeSerializedData($event);
        }
        if ($this->checkExpectedType($event, Path::class)
        ) {
            $this->updateDeSerializedPathData($event);
        }

    }

    /**
     * @param ObjectEvent $event
     */
    public function onPostSerialize(ObjectEvent $event)
    {
        $object = $event->getObject();
        /** @var GenericSerializationVisitor $visitor */
        $visitor = $event->getVisitor();
        if (method_exists($object, 'getVendorExtensions')) {
            $vendorExtensions = $object->getVendorExtensions();
            if ($vendorExtensions) {
                foreach ($vendorExtensions as $key => $value) {
                    $visitor->addData($key, $value);
                }
            }
        }
    }

    /**
     * @param string $key
     * @return bool
     */
    private function isVendorExtensionField($key)
    {
        return strrpos($key, 'x-') !== false;
    }

    /**
     * @param PreDeserializeEvent $event
     * @param string $expectedType
     * @return bool
     */
    private function checkExpectedType(PreDeserializeEvent $event, $expectedType)
    {
        return $expectedType == $event->getType()['name'];
    }

    /**
     * @param PreDeserializeEvent $event
     * @param string $parentClass
     * @return bool
     */
    private function checkTypeParent(PreDeserializeEvent $event, $parentClass)
    {
        return is_subclass_of($event->getType()['name'], $parentClass);
    }

    /**
     * @param PreDeserializeEvent $event
     */
    private function updateDeSerializedData(PreDeserializeEvent $event)
    {
        $data = $event->getData();
        $data['vendorExtensions'] = [];
        foreach ($data as $key => $value) {
            if ($this->isVendorExtensionField($key)) {
                $data['vendorExtensions'][$key] = $value;
                unset($data[$key]);
            }
        }
        $event->setData($data);
    }

    /**
     * @param PreDeserializeEvent $event
     */
    private function updateDeSerializedPathData(PreDeserializeEvent $event)
    {
        $outerData = $event->getData();
        $data = $outerData['data'];
        $outerData['vendorExtensions'] = [];
        foreach ($data as $key => $value) {
            if ($this->isVendorExtensionField($key)) {
                $outerData['vendorExtensions'][$key] = $value;
                unset($outerData['data'][$key]);
            }
        }
        $event->setData($outerData);
    }

}