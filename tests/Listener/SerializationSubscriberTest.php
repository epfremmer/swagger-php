<?php
/**
 * File SerializationSubscriberTest.php
 *
 * @author Edward Pfremmer <epfremme@nerdery.com>
 */
namespace Nerdery\Swagger\Listener;

use Doctrine\Common\Annotations\AnnotationReader;
use JMS\Serializer\EventDispatcher\Events;
use JMS\Serializer\EventDispatcher\PreDeserializeEvent;
use JMS\Serializer\EventDispatcher\PreSerializeEvent;
use \Mockery as m;
use Nerdery\Swagger\Entity\Parameters\RefParameter;
use Nerdery\Swagger\Entity\Path;
use Nerdery\Swagger\Entity\Schemas\AbstractSchema;
use Nerdery\Swagger\Entity\Schemas\MultiSchema;
use Nerdery\Swagger\Entity\Schemas\ObjectSchema;
use Nerdery\Swagger\Entity\Schemas\RefSchema;

/**
 * Class SerializationSubscriberTest
 *
 * @package Nerdery\Swagger
 * @subPackage Listener
 */
class SerializationSubscriberTest extends \PHPUnit_Framework_TestCase
{

    public function testConstruct()
    {
        $subscriber = new SerializationSubscriber();

        $this->assertInstanceOf(SerializationSubscriber::class, $subscriber);
        $this->assertAttributeInstanceOf(AnnotationReader::class, 'reader', $subscriber);
    }

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

    public function testOnPreSerialize()
    {
        $subscriber = new SerializationSubscriber();
        $event = m::mock(PreSerializeEvent::class);
        $data = m::mock(AbstractSchema::class);

        $event->shouldReceive('getObject')->once()->withNoArgs()->andReturn($data);
        $event->shouldReceive('setType')->once()->with(get_class($data))->andReturnUndefined();

        $subscriber->onPreSerialize($event);
    }

    public function testOnPreDeserialize()
    {
        $subscriber = new SerializationSubscriber();
        $event = m::mock(PreDeserializeEvent::class);

        $event->shouldReceive('getType')->once()->withNoArgs()->andReturn(['name' => AbstractSchema::class]);
        $event->shouldReceive('getData')->once()->withNoArgs()->andReturn(['type' => 'object']);
        $event->shouldReceive('setType')->once()->with(ObjectSchema::class)->andReturnUndefined();

        $subscriber->onPreDeserialize($event);
    }

    public function testOnPreDeserializeCustomJmsType()
    {
        $subscriber = new SerializationSubscriber();
        $event = m::mock(PreDeserializeEvent::class);

        $event->shouldReceive('getType')->once()->withNoArgs()->andReturn(['name' => 'collection']);

        $subscriber->onPreDeserialize($event);
    }

    public function testOnSchemaPreDeserialize()
    {
        $subscriber = new SerializationSubscriber();
        $event = m::mock(PreDeserializeEvent::class);

        $event->shouldReceive('getData')->once()->withNoArgs()->andReturn(['foo' => 'bar']);
        $event->shouldNotReceive('setType');

        $subscriber->onSchemaPreDeserialize($event);
    }

    public function testOnSchemaPreDeserializeRefType()
    {
        $subscriber = new SerializationSubscriber();
        $event = m::mock(PreDeserializeEvent::class);

        $event->shouldReceive('getData')->once()->withNoArgs()->andReturn(['$ref' => '#/foo']);
        $event->shouldReceive('setType')->once()->with(RefSchema::class)->andReturnUndefined();

        $subscriber->onSchemaPreDeserialize($event);
    }

    public function testOnSchemaPreDeserializeMultiType()
    {
        $subscriber = new SerializationSubscriber();
        $event = m::mock(PreDeserializeEvent::class);

        $event->shouldReceive('getData')->once()->withNoArgs()->andReturn(['type' => ['string', 'null']]);
        $event->shouldReceive('setType')->once()->with(MultiSchema::class)->andReturnUndefined();

        $subscriber->onSchemaPreDeserialize($event);
    }

    public function testOnParameterPreDeserialize()
    {
        $subscriber = new SerializationSubscriber();
        $event = m::mock(PreDeserializeEvent::class);

        $event->shouldReceive('getData')->once()->withNoArgs()->andReturn(['in' => 'body']);
        $event->shouldReceive('setData')->once()->with(['class' => 'body', 'in' => 'body'])->andReturnUndefined();
        $event->shouldNotReceive('setType');

        $subscriber->onParameterPreDeserialize($event);
    }

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

    public function testOnParameterPreDeserializeRef()
    {
        $subscriber = new SerializationSubscriber();
        $event = m::mock(PreDeserializeEvent::class);

        $event->shouldReceive('getData')->once()->withNoArgs()->andReturn(['$ref' => '#/foo']);
        $event->shouldReceive('setType')->once()->with(RefParameter::class)->andReturnUndefined();
        $event->shouldNotReceive('setData');

        $subscriber->onParameterPreDeserialize($event);
    }

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
