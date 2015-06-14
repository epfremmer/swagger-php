<?php
/**
 * File ContactTest.php
 *
 * @author Edward Pfremmer <epfremme@nerdery.com>
 */
namespace Epfremmer\SwaggerBundle\Tests\Entity;

use Epfremmer\SwaggerBundle\Entity\Contact;
use JMS\Serializer\Serializer;
use JMS\Serializer\SerializerBuilder;

/**
 * Class ContactTest
 *
 * @package Epfremmer\SwaggerBundle
 * @subpackage Tests\Entity
 */
class ContactTest extends \PHPUnit_Framework_TestCase
{

    /**
     * @var Contact
     */
    protected $contact;

    /**
     * @var Serializer
     */
    protected static $serializer;

    /**
     * {@inheritdoc}
     */
    protected function setUp()
    {
        $this->contact = new Contact();
    }

    /**
     * {@inheritdoc}
     */
    public static function setUpBeforeClass()
    {
        self::$serializer = SerializerBuilder::create()->build();
    }

    /**
     * @covers Epfremmer\SwaggerBundle\Entity\Contact::setName
     * @covers Epfremmer\SwaggerBundle\Entity\Contact::getName
     */
    public function testName()
    {
        $this->assertClassHasAttribute('name', Contact::class);
        $this->assertInstanceOf(Contact::class, $this->contact->setName('foo'));
        $this->assertAttributeEquals('foo', 'name', $this->contact);
        $this->assertEquals('foo', $this->contact->getName());
    }

    /**
     * @covers Epfremmer\SwaggerBundle\Entity\Contact::setUrl
     * @covers Epfremmer\SwaggerBundle\Entity\Contact::getUrl
     */
    public function testUrl()
    {
        $this->assertClassHasAttribute('url', Contact::class);
        $this->assertInstanceOf(Contact::class, $this->contact->setUrl('foo'));
        $this->assertAttributeEquals('foo', 'url', $this->contact);
        $this->assertEquals('foo', $this->contact->getUrl());
    }

    /**
     * @covers Epfremmer\SwaggerBundle\Entity\Contact::setEmail
     * @covers Epfremmer\SwaggerBundle\Entity\Contact::getEmail
     */
    public function testEmail()
    {
        $this->assertClassHasAttribute('email', Contact::class);
        $this->assertInstanceOf(Contact::class, $this->contact->setEmail('foo'));
        $this->assertAttributeEquals('foo', 'email', $this->contact);
        $this->assertEquals('foo', $this->contact->getEmail());
    }

    /**
     * @covers Epfremmer\SwaggerBundle\Entity\Contact
     */
    public function testDeserialize()
    {
        $data = json_encode((object)[
            'name'  => 'foo',
            'url'   => 'bar',
            'email' => 'baz',
        ]);

        $contact = self::$serializer->deserialize($data, Contact::class, 'json');

        $this->assertInstanceOf(Contact::class, $contact);
        $this->assertAttributeEquals('foo', 'name', $contact);
        $this->assertAttributeEquals('bar', 'url', $contact);
        $this->assertAttributeEquals('baz', 'email', $contact);
    }
}
