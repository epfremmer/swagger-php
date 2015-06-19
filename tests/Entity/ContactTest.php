<?php
/**
 * File ContactTest.php
 *
 * @author Edward Pfremmer <epfremme@nerdery.com>
 */
namespace ERP\Swagger\Tests\Entity;

use ERP\Swagger\Entity\Contact;
use ERP\Swagger\Tests\Mixin\SerializerContextTrait;

/**
 * Class ContactTest
 *
 * @package ERP\Swagger
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
     * @covers ERP\Swagger\Entity\Contact::getName
     * @covers ERP\Swagger\Entity\Contact::setName
     */
    public function testName()
    {
        $this->assertClassHasAttribute('name', Contact::class);
        $this->assertInstanceOf(Contact::class, $this->contact->setName('foo'));
        $this->assertAttributeEquals('foo', 'name', $this->contact);
        $this->assertEquals('foo', $this->contact->getName());
    }

    /**
     * @covers ERP\Swagger\Entity\Contact::getUrl
     * @covers ERP\Swagger\Entity\Contact::setUrl
     */
    public function testUrl()
    {
        $this->assertClassHasAttribute('url', Contact::class);
        $this->assertInstanceOf(Contact::class, $this->contact->setUrl('foo'));
        $this->assertAttributeEquals('foo', 'url', $this->contact);
        $this->assertEquals('foo', $this->contact->getUrl());
    }

    /**
     * @covers ERP\Swagger\Entity\Contact::getEmail
     * @covers ERP\Swagger\Entity\Contact::setEmail
     */
    public function testEmail()
    {
        $this->assertClassHasAttribute('email', Contact::class);
        $this->assertInstanceOf(Contact::class, $this->contact->setEmail('foo'));
        $this->assertAttributeEquals('foo', 'email', $this->contact);
        $this->assertEquals('foo', $this->contact->getEmail());
    }

    /**
     * @covers ERP\Swagger\Entity\Contact
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
