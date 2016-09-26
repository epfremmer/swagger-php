<?php
/**
 * File SerializationSubscriberTest.php
 *
 * @author Edward Pfremmer <epfremme@nerdery.com>
 */
namespace Epfremme\Swagger\Tests\Listener;

use Doctrine\Common\Annotations\AnnotationReader;
use Epfremme\Swagger\Listener\SerializationSubscriber;
use JMS\Serializer\EventDispatcher\Events;
use JMS\Serializer\EventDispatcher\PreDeserializeEvent;
use JMS\Serializer\EventDispatcher\PreSerializeEvent;
use \Mockery as m;
use Epfremme\Swagger\Entity\Parameters\RefParameter;
use Epfremme\Swagger\Entity\Path;
use Epfremme\Swagger\Entity\Schemas\AbstractSchema;
use Epfremme\Swagger\Entity\Schemas\MultiSchema;
use Epfremme\Swagger\Entity\Schemas\ObjectSchema;
use Epfremme\Swagger\Entity\Schemas\RefSchema;

/**
 * Class SerializationSubscriberTest
 *
 * @package Epfremme\Swagger
 * @subPackage Listener
 */
class SerializationSubscriberTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @covers Epfremme\Swagger\Listener\SerializationSubscriber::__construct
     */
    public function testConstruct()
    {
        $subscriber = new SerializationSubscriber();

        $this->assertInstanceOf(SerializationSubscriber::class, $subscriber);
        $this->assertAttributeInstanceOf(AnnotationReader::class, 'reader', $subscriber);
    }

    /**
     * @covers Epfremme\Swagger\Listener\SerializationSubscriber::getSubscribedEvents
     */
    public function testGetSubscribedEvents()
    {
        $subscriber = new SerializationSubscriber();
        $events = new \ReflectionClass(Events::class);

        foreach ($subscriber->getSubscribedEvents() as $event) {
            $this->assertArrayHasKey('event', $event);
            $this->assertArrayHasKey('method', $event);
            $this->assertTrue(in_array($event['event'], $events->getConstants()));
            $this->assertTrue(method_exists($subscriber, $event['method']));
        }
    }

    /**
     * @covers Epfremme\Swagger\Listener\SerializationSubscriber::onPreSerialize
     */
    public function testOnPreSerialize()
    {
        $subscriber = new SerializationSubscriber();
        $event = m::mock(PreSerializeEvent::class);
        $data = m::mock(AbstractSchema::class);

        $event->shouldReceive('getObject')->once()->withNoArgs()->andReturn($data);
        $event->shouldReceive('setType')->once()->with(get_class($data))->andReturnUndefined();

        $subscriber->onPreSerialize($event);
    }

    /**
     * @covers Epfremme\Swagger\Listener\SerializationSubscriber::onPreDeserialize
     */
    public function testOnPreDeserialize()
    {
        $subscriber = new SerializationSubscriber();
        $event = m::mock(PreDeserializeEvent::class);

        $event->shouldReceive('getType')->once()->withNoArgs()->andReturn(['name' => AbstractSchema::class]);
        $event->shouldReceive('getData')->once()->withNoArgs()->andReturn(['type' => 'object']);
        $event->shouldReceive('setType')->once()->with(ObjectSchema::class)->andReturnUndefined();

        $subscriber->onPreDeserialize($event);
    }

    /**
     * @covers Epfremme\Swagger\Listener\SerializationSubscriber::onPreDeserialize
     */
    public function testOnPreDeserializeCustomJmsType()
    {
        $subscriber = new SerializationSubscriber();
        $event = m::mock(PreDeserializeEvent::class);

        $event->shouldReceive('getType')->once()->withNoArgs()->andReturn(['name' => 'collection']);

        $subscriber->onPreDeserialize($event);
    }

    /**
     * @covers Epfremme\Swagger\Listener\SerializationSubscriber::onSchemaPreDeserialize
     */
    public function testOnSchemaPreDeserialize()
    {
        $subscriber = new SerializationSubscriber();
        $event = m::mock(PreDeserializeEvent::class);

        $event->shouldReceive('getData')->once()->withNoArgs()->andReturn(['foo' => 'bar']);
        $event->shouldNotReceive('setType');

        $subscriber->onSchemaPreDeserialize($event);
    }

    /**
     * @covers Epfremme\Swagger\Listener\SerializationSubscriber::onSchemaPreDeserialize
     */
    public function testOnSchemaPreDeserializeRefType()
    {
        $subscriber = new SerializationSubscriber();
        $event = m::mock(PreDeserializeEvent::class);

        $event->shouldReceive('getData')->once()->withNoArgs()->andReturn(['$ref' => '#/foo']);
        $event->shouldReceive('setType')->once()->with(RefSchema::class)->andReturnUndefined();

        $subscriber->onSchemaPreDeserialize($event);
    }

    /**
     * @covers Epfremme\Swagger\Listener\SerializationSubscriber::onSchemaPreDeserialize
     */
    public function testOnSchemaPreDeserializeMultiType()
    {
        $subscriber = new SerializationSubscriber();
        $event = m::mock(PreDeserializeEvent::class);

        $event->shouldReceive('getData')->once()->withNoArgs()->andReturn(['type' => ['string', 'null']]);
        $event->shouldReceive('setType')->once()->with(MultiSchema::class)->andReturnUndefined();

        $subscriber->onSchemaPreDeserialize($event);
    }

    /**
     * @covers Epfremme\Swagger\Listener\SerializationSubscriber::onParameterPreDeserialize
     */
    public function testOnParameterPreDeserialize()
    {
        $subscriber = new SerializationSubscriber();
        $event = m::mock(PreDeserializeEvent::class);

        $event->shouldReceive('getData')->once()->withNoArgs()->andReturn(['in' => 'body']);
        $event->shouldReceive('setData')->once()->with(['class' => 'body', 'in' => 'body'])->andReturnUndefined();
        $event->shouldNotReceive('setType');

        $subscriber->onParameterPreDeserialize($event);
    }

    /**
     * @covers Epfremme\Swagger\Listener\SerializationSubscriber::onParameterPreDeserialize
     */
    public function testOnParameterPreDeserializeTyped()
    {
        $subscriber = new SerializationSubscriber();
        $event = m::mock(PreDeserializeEvent::class);
        $data = ['in' => 'path', 'type' => 'string'];

        $event->shouldReceive('getData')->once()->withNoArgs()->andReturn($data);
        $event->shouldReceive('setData')->once()->with($data + ['class' => 'path.string'])->andReturnUndefined();
        $event->shouldNotReceive('setType');

        $subscriber->onParameterPreDeserialize($event);
    }

    /**
     * @covers Epfremme\Swagger\Listener\SerializationSubscriber::onParameterPreDeserialize
     */
    public function testOnParameterPreDeserializeRef()
    {
        $subscriber = new SerializationSubscriber();
        $event = m::mock(PreDeserializeEvent::class);

        $event->shouldReceive('getData')->once()->withNoArgs()->andReturn(['$ref' => '#/foo']);
        $event->shouldReceive('setType')->once()->with(RefParameter::class)->andReturnUndefined();
        $event->shouldNotReceive('setData');

        $subscriber->onParameterPreDeserialize($event);
    }

    /**
     * @covers Epfremme\Swagger\Listener\SerializationSubscriber::onPreDeserializeCollection
     */
    public function testOnPreDeserializeCollection()
    {
        $subscriber = new SerializationSubscriber();
        $event = m::mock(PreDeserializeEvent::class);
        $data = m::mock(Path::class);

        $event->shouldReceive('getData')->once()->withNoArgs()->andReturn($data);
        $event->shouldReceive('setData')->once()->with(['data' => $data])->andReturnUndefined();

        $subscriber->onPreDeserializeCollection($event);
    }
}
