<?php
/**
 * File ContactTest.php
 *
 * @author Edward Pfremmer <epfremme@nerdery.com>
 */
namespace Nerdery\Swagger\Tests\Entity;

use Nerdery\Swagger\Entity\Contact;
use Nerdery\Swagger\Tests\Mixin\SerializerContextTrait;

/**
 * Class ContactTest
 *
 * @package Nerdery\Swagger
 * @subpackage Tests\Entity
 */
class ContactTest extends \PHPUnit_Framework_TestCase
{
    use SerializerContextTrait;

    /**
     * @var Contact
     */
    protected $contact;

    /**
     * {@inheritdoc}
     */
    protected function setUp()
    {
        $this->contact = new Contact();
    }

    /**
     * @covers Nerdery\Swagger\Entity\Contact::getName
     * @covers Nerdery\Swagger\Entity\Contact::setName
     */
    public function testName()
    {
        $this->assertClassHasAttribute('name', Contact::class);
        $this->assertInstanceOf(Contact::class, $this->contact->setName('foo'));
        $this->assertAttributeEquals('foo', 'name', $this->contact);
        $this->assertEquals('foo', $this->contact->getName());
    }

    /**
     * @covers Nerdery\Swagger\Entity\Contact::getUrl
     * @covers Nerdery\Swagger\Entity\Contact::setUrl
     */
    public function testUrl()
    {
        $this->assertClassHasAttribute('url', Contact::class);
        $this->assertInstanceOf(Contact::class, $this->contact->setUrl('foo'));
        $this->assertAttributeEquals('foo', 'url', $this->contact);
        $this->assertEquals('foo', $this->contact->getUrl());
    }

    /**
     * @covers Nerdery\Swagger\Entity\Contact::getEmail
     * @covers Nerdery\Swagger\Entity\Contact::setEmail
     */
    public function testEmail()
    {
        $this->assertClassHasAttribute('email', Contact::class);
        $this->assertInstanceOf(Contact::class, $this->contact->setEmail('foo'));
        $this->assertAttributeEquals('foo', 'email', $this->contact);
        $this->assertEquals('foo', $this->contact->getEmail());
    }

    /**
     * @covers Nerdery\Swagger\Entity\Contact
     */
    public function testSerialize()
    {
        $data = json_encode([
            'name'  => 'foo',
            'url'   => 'bar',
            'email' => 'baz',
        ]);

        $contact = $this->getSerializer()->deserialize($data, Contact::class, 'json');

        $this->assertInstanceOf(Contact::class, $contact);
        $this->assertAttributeEquals('foo', 'name', $contact);
        $this->assertAttributeEquals('bar', 'url', $contact);
        $this->assertAttributeEquals('baz', 'email', $contact);

        $json = $this->getSerializer()->serialize($contact, 'json');

        $this->assertJson($json);
        $this->assertJsonStringEqualsJsonString($data, $json);
    }
}
