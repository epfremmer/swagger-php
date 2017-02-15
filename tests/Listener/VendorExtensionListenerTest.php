<?php
namespace Epfremme\Swagger\Tests\Listener;

use Epfremme\Swagger\Entity\Contact;
use Epfremme\Swagger\Entity\ExternalDocumentation;
use Epfremme\Swagger\Entity\Headers\ArrayHeader;
use Epfremme\Swagger\Entity\Headers\BooleanHeader;
use Epfremme\Swagger\Entity\Headers\IntegerHeader;
use Epfremme\Swagger\Entity\Headers\NumberHeader;
use Epfremme\Swagger\Entity\Headers\StringHeader;
use Epfremme\Swagger\Entity\Info;
use Epfremme\Swagger\Entity\License;
use Epfremme\Swagger\Entity\Operation;
use Epfremme\Swagger\Entity\Parameters\FormParameter\ArrayType;
use Epfremme\Swagger\Entity\Parameters\FormParameter\BooleanType;
use Epfremme\Swagger\Entity\Parameters\FormParameter\FileType;
use Epfremme\Swagger\Entity\Parameters\FormParameter\IntegerType;
use Epfremme\Swagger\Entity\Parameters\FormParameter\NumberType;
use Epfremme\Swagger\Entity\Parameters\FormParameter\StringType;
use Epfremme\Swagger\Entity\Response;
use Epfremme\Swagger\Entity\Schemas\ArraySchema;
use Epfremme\Swagger\Entity\Schemas\BooleanSchema;
use Epfremme\Swagger\Entity\Schemas\IntegerSchema;
use Epfremme\Swagger\Entity\Schemas\MultiSchema;
use Epfremme\Swagger\Entity\Schemas\NullSchema;
use Epfremme\Swagger\Entity\Schemas\NumberSchema;
use Epfremme\Swagger\Entity\Schemas\ObjectSchema;
use Epfremme\Swagger\Entity\Schemas\StringSchema;
use Epfremme\Swagger\Entity\SecurityDefinition;
use Epfremme\Swagger\Entity\Tag;
use Epfremme\Swagger\Listener\VendorExtensionListener;
use JMS\Serializer\DeserializationContext;
use JMS\Serializer\EventDispatcher\Events;
use JMS\Serializer\EventDispatcher\ObjectEvent;
use JMS\Serializer\EventDispatcher\PreDeserializeEvent;
use JMS\Serializer\GenericSerializationVisitor;
use JMS\Serializer\JsonSerializationVisitor;
use JMS\Serializer\SerializationContext;


/**
 * Class VendorExtensionListenerTest
 * @package Epfremme\Swagger\Tests\Listener
 */
class VendorExtensionListenerTest extends \PHPUnit_Framework_TestCase
{

    /**
     * @test
     */
    public function shouldReturnEventToWhichIsSubscribed()
    {
        $events = VendorExtensionListener::getSubscribedEvents();

        $this->assertEquals(
            [
                ['event' => Events::PRE_DESERIALIZE, 'method' => 'onDePreSerialize'],
                ['event' => Events::POST_SERIALIZE, 'method' => 'onPostSerialize'],
            ],
            $events
        );
    }

    /**
     * @test
     * @param string $className
     * @dataProvider eventTypeProvider
     * @throws \PHPUnit_Framework_ExpectationFailedException
     */
    public function shouldSetVendorExtensionsOnInfoObject($className)
    {
        $lister = new VendorExtensionListener();

        $event = new PreDeserializeEvent(
            new DeserializationContext(),
            [
                'foo' => 'bar',
                'x-field1' => 'foo1',
                'x-field2' => ['foo2']
            ],
            ['name' => $className, 'params' => []]
        );
        $lister->onDePreSerialize($event);

        $modifiedData = $event->getData();

        $expected = [
            'foo' => 'bar',
            'vendorExtensions' => [
                'x-field1' => 'foo1',
                'x-field2' => ['foo2']
            ]
        ];
        $this->assertEquals($expected, $modifiedData);
    }

    /**
     * @return array
     */
    public function eventTypeProvider()
    {
        return [
            [Info::class],
            [Response::class],
            [Operation::class],
            [Tag::class],
            [License::class],
            [ExternalDocumentation::class],
            [SecurityDefinition::class],
            [ArrayHeader::class],
            [BooleanHeader::class],
            [IntegerHeader::class],
            [NumberHeader::class],
            [StringHeader::class],

            [ArraySchema::class],
            [BooleanSchema::class],
            [IntegerSchema::class],
            [MultiSchema::class],
            [NullSchema::class],
            [NumberSchema::class],
            [ObjectSchema::class],
            [StringSchema::class],

            [ArrayType::class],
            [BooleanType::class],
            [FileType::class],
            [IntegerType::class],
            [NumberType::class],
            [StringType::class],

            [\Epfremme\Swagger\Entity\Parameters\HeaderParameter\ArrayType::class],
            [\Epfremme\Swagger\Entity\Parameters\HeaderParameter\BooleanType::class],
            [\Epfremme\Swagger\Entity\Parameters\HeaderParameter\IntegerType::class],
            [\Epfremme\Swagger\Entity\Parameters\HeaderParameter\NumberType::class],
            [\Epfremme\Swagger\Entity\Parameters\HeaderParameter\StringType::class],

            [\Epfremme\Swagger\Entity\Parameters\PathParameter\BooleanType::class],
            [\Epfremme\Swagger\Entity\Parameters\PathParameter\IntegerType::class],
            [\Epfremme\Swagger\Entity\Parameters\PathParameter\StringType::class],

            [\Epfremme\Swagger\Entity\Parameters\QueryParameter\ArrayType::class],
            [\Epfremme\Swagger\Entity\Parameters\QueryParameter\BooleanType::class],
            [\Epfremme\Swagger\Entity\Parameters\QueryParameter\IntegerType::class],
            [\Epfremme\Swagger\Entity\Parameters\QueryParameter\NumberType::class],
            [\Epfremme\Swagger\Entity\Parameters\QueryParameter\StringType::class],
        ];
    }

    /**
     * @test
     */
    public function shouldAddDataOnPostSerialize()
    {
        $info = new Info();
        $info->setVendorExtensions(
            [
                'x-foo' => 'bar'
            ]
        );
        $mockBuilder = $this->getMockBuilder(ObjectEvent::class)->disableOriginalConstructor();
        $objectEventMock = $mockBuilder->getMock();
        $objectEventMock->method('getObject')->willReturn($info);

        $mockBuilder = $this->getMockBuilder(GenericSerializationVisitor::class)->disableOriginalConstructor();
        $visitorMock = $mockBuilder->getMock();
        $objectEventMock->method('getVisitor')->willReturn($visitorMock);

        $visitorMock->expects($this->once())->method('addData')->with('x-foo', 'bar');

        $lister = new VendorExtensionListener();

        $lister->onPostSerialize($objectEventMock);
    }

    /**
     * @test
     */
    public function shouldNotAddDataOnPostSerialize()
    {
        $info = new Contact();
        $mockBuilder = $this->getMockBuilder(ObjectEvent::class)->disableOriginalConstructor();
        $objectEventMock = $mockBuilder->getMock();
        $objectEventMock->method('getObject')->willReturn($info);

        $mockBuilder = $this->getMockBuilder(GenericSerializationVisitor::class)->disableOriginalConstructor();
        $visitorMock = $mockBuilder->getMock();
        $objectEventMock->method('getVisitor')->willReturn($visitorMock);

        $visitorMock->expects($this->never())->method('addData');

        $lister = new VendorExtensionListener();

        $lister->onPostSerialize($objectEventMock);
    }
}
