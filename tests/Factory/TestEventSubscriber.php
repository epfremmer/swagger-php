<?php
namespace Epfremme\Swagger\Tests\Factory;

use JMS\Serializer\EventDispatcher\EventSubscriberInterface;

/**
 * Class TestEventSubscriber
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
            ['event' => 'serializer.pre_serialize', 'method' => 'onPreSerialize']
        ];
    }

    public function onPreSerialize($event)
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