<?php
/**
 * File InfoTest.php
 *
 * @author Edward Pfremmer <epfremme@nerdery.com>
 */
namespace ERP\Swagger\Tests\Entity;

use ERP\Swagger\Entity\Contact;
use ERP\Swagger\Entity\Info;
use ERP\Swagger\Entity\License;
use ERP\Swagger\Tests\Mixin\SerializerContextTrait;

/**
 * Class InfoTest
 *
 * @package ERP\Swagger
 * @subpackage Tests\Entity
 */
class InfoTest extends \PHPUnit_Framework_TestCase
{
    use SerializerContextTrait;

    /**
     * @var Info
     */
    protected $info;

    /**
     * {@inheritdoc}
     */
    protected function setUp()
    {
        $this->info = new Info();
    }

    /**
     * @covers ERP\Swagger\Entity\Info::getTitle
     * @covers ERP\Swagger\Entity\Info::setTitle
     */
    public function testTitle()
    {
        $this->assertClassHasAttribute('title', Info::class);
        $this->assertInstanceOf(Info::class, $this->info->setTitle('foo'));
        $this->assertAttributeEquals('foo', 'title', $this->info);
        $this->assertEquals('foo', $this->info->getTitle());
    }

    /**
     * @covers ERP\Swagger\Entity\Info::getDescription
     * @covers ERP\Swagger\Entity\Info::setDescription
     */
    public function testDescription()
    {
        $this->assertClassHasAttribute('description', Info::class);
        $this->assertInstanceOf(Info::class, $this->info->setDescription('foo'));
        $this->assertAttributeEquals('foo', 'description', $this->info);
        $this->assertEquals('foo', $this->info->getDescription());
    }

    /**
     * @covers ERP\Swagger\Entity\Info::getTermsOfService
     * @covers ERP\Swagger\Entity\Info::setTermsOfService
     */
    public function testTermsOfService()
    {
        $this->assertClassHasAttribute('termsOfService', Info::class);
        $this->assertInstanceOf(Info::class, $this->info->setTermsOfService('foo'));
        $this->assertAttributeEquals('foo', 'termsOfService', $this->info);
        $this->assertEquals('foo', $this->info->getTermsOfService());
    }

    /**
     * @covers ERP\Swagger\Entity\Info::getContact
     * @covers ERP\Swagger\Entity\Info::setContact
     */
    public function testContact()
    {
        $contact = new Contact();

        $this->assertClassHasAttribute('contact', Info::class);
        $this->assertInstanceOf(Info::class, $this->info->setContact($contact));
        $this->assertAttributeInstanceOf(Contact::class, 'contact', $this->info);
        $this->assertAttributeEquals($contact, 'contact', $this->info);
        $this->assertEquals($contact, $this->info->getContact());
    }

    /**
     * @covers ERP\Swagger\Entity\Info::getLicense
     * @covers ERP\Swagger\Entity\Info::setLicense
     */
    public function testLicense()
    {
        $license = new License();

        $this->assertClassHasAttribute('license', Info::class);
        $this->assertInstanceOf(Info::class, $this->info->setLicense($license));
        $this->assertAttributeInstanceOf(License::class, 'license', $this->info);
        $this->assertAttributeEquals($license, 'license', $this->info);
        $this->assertEquals($license, $this->info->getLicense());
    }

    /**
     * @covers ERP\Swagger\Entity\Info::getVersion
     * @covers ERP\Swagger\Entity\Info::setVersion
     */
    public function testVersion()
    {
        $this->assertClassHasAttribute('version', Info::class);
        $this->assertInstanceOf(Info::class, $this->info->setVersion('1.0.0'));
        $this->assertAttributeEquals('1.0.0', 'version', $this->info);
        $this->assertEquals('1.0.0', $this->info->getVersion());
    }

    /**
     * @covers ERP\Swagger\Entity\Info
     */
    public function testSerialize()
    {
        $data = json_encode([
            'title'          => 'foo',
            'description'    => 'bar',
            'termsOfService' => 'baz',
            'contact' => (object)[],
            'license' => (object)[],
            'version' => '1.0.0'
        ]);

        $info = $this->getSerializer()->deserialize($data, Info::class, 'json');

        $this->assertInstanceOf(Info::class, $info);
        $this->assertAttributeEquals('foo', 'title', $info);
        $this->assertAttributeEquals('bar', 'description', $info);
        $this->assertAttributeEquals('baz', 'termsOfService', $info);
        $this->assertAttributeInstanceOf(Contact::class, 'contact', $info);
        $this->assertAttributeInstanceOf(License::class, 'license', $info);
        $this->assertAttributeEquals('1.0.0', 'version', $info);

        $json = $this->getSerializer()->serialize($info, 'json');

        $this->assertJson($json);
        $this->assertJsonStringEqualsJsonString($data, $json);
    }
}
