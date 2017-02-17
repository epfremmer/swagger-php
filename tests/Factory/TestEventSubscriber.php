<?php
namespace Epfremme\Swagger\Tests\Factory;

use JMS\Serializer\EventDispatcher\Events;
use JMS\Serializer\EventDispatcher\EventSubscriberInterface;
use JMS\Serializer\EventDispatcher\PreDeserializeEvent;

/**
 * Class TestEventSubscriber
 *
 * @package Epfremme\Swagger\Tests\Factory
 */
class TestEventSubscriber implements EventSubscriberInterface
{
    /**
     * @var bool
     */
    private $testFlag = false;

    /**
     * @return array
     */
    public static function getSubscribedEvents()
    {
        return [
            ['event' => Events::PRE_DESERIALIZE, 'method' => 'onPreDeserialize']
        ];
    }

    /**
     * @param PreDeserializeEvent $event
     */
    public function onPreDeserialize(PreDeserializeEvent $event)
    {
        $this->testFlag = true;
    }

    /**
     * @return boolean
     */
    public function isTestFlag()
    {
        return $this->testFlag;
    }
}