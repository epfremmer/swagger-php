<?php
/**
 * File ContactTest.php
 *
 * @author Edward Pfremmer <epfremme@nerdery.com>
 */
namespace Epfremmer\SwaggerBundle\Tests\Entity;

use Epfremmer\SwaggerBundle\Entity\Contact;
use Epfremmer\SwaggerBundle\Tests\Mixin\SerializerContextTrait;

/**
 * Class ContactTest
 *
 * @package Epfremmer\SwaggerBundle
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
     * @covers Epfremmer\SwaggerBundle\Entity\Contact::getName
     * @covers Epfremmer\SwaggerBundle\Entity\Contact::setName
     */
    public function testName()
    {
        $this->assertClassHasAttribute('name', Contact::class);
        $this->assertInstanceOf(Contact::class, $this->contact->setName('foo'));
        $this->assertAttributeEquals('foo', 'name', $this->contact);
        $this->assertEquals('foo', $this->contact->getName());
    }

    /**
     * @covers Epfremmer\SwaggerBundle\Entity\Contact::getUrl
     * @covers Epfremmer\SwaggerBundle\Entity\Contact::setUrl
     */
    public function testUrl()
    {
        $this->assertClassHasAttribute('url', Contact::class);
        $this->assertInstanceOf(Contact::class, $this->contact->setUrl('foo'));
        $this->assertAttributeEquals('foo', 'url', $this->contact);
        $this->assertEquals('foo', $this->contact->getUrl());
    }

    /**
     * @covers Epfremmer\SwaggerBundle\Entity\Contact::getEmail
     * @covers Epfremmer\SwaggerBundle\Entity\Contact::setEmail
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
