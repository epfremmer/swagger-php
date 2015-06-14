<?php
/**
 * File SecurityDefinitionTest.php
 *
 * @author Edward Pfremmer <epfremme@nerdery.com>
 */
namespace Epfremmer\SwaggerBundle\Tests\Entity;

use Epfremmer\SwaggerBundle\Entity\SecurityDefinition;
use JMS\Serializer\Serializer;
use JMS\Serializer\SerializerBuilder;

/**
 * Class SecurityDefinitionTest
 *
 * @package Epfremmer\SwaggerBundle
 * @subpackage Tests\Entity
 */
class SecurityDefinitionTest extends \PHPUnit_Framework_TestCase
{

    /**
     * @var SecurityDefinition
     */
    protected $securityDefinition;

    /**
     * @var Serializer
     */
    protected static $serializer;

    /**
     * {@inheritdoc}
     */
    protected function setUp()
    {
        $this->securityDefinition = new SecurityDefinition();
    }

    /**
     * {@inheritdoc}
     */
    public static function setUpBeforeClass()
    {
        self::$serializer = SerializerBuilder::create()->build();
    }

    /**
     * @covers Epfremmer\SwaggerBundle\Entity\SecurityDefinition::getType
     * @covers Epfremmer\SwaggerBundle\Entity\SecurityDefinition::setType
     */
    public function testType()
    {
        $this->assertClassHasAttribute('type', SecurityDefinition::class);
        $this->assertInstanceOf(SecurityDefinition::class, $this->securityDefinition->setType('foo'));
        $this->assertAttributeEquals('foo', 'type', $this->securityDefinition);
        $this->assertEquals('foo', $this->securityDefinition->getType());
    }

    /**
     * @covers Epfremmer\SwaggerBundle\Entity\SecurityDefinition::getDescription
     * @covers Epfremmer\SwaggerBundle\Entity\SecurityDefinition::setDescription
     */
    public function testDescription()
    {
        $this->assertClassHasAttribute('description', SecurityDefinition::class);
        $this->assertInstanceOf(SecurityDefinition::class, $this->securityDefinition->setDescription('foo'));
        $this->assertAttributeEquals('foo', 'description', $this->securityDefinition);
        $this->assertEquals('foo', $this->securityDefinition->getDescription());
    }

    /**
     * @covers Epfremmer\SwaggerBundle\Entity\SecurityDefinition::getName
     * @covers Epfremmer\SwaggerBundle\Entity\SecurityDefinition::setName
     */
    public function testName()
    {
        $this->assertClassHasAttribute('name', SecurityDefinition::class);
        $this->assertInstanceOf(SecurityDefinition::class, $this->securityDefinition->setName('foo'));
        $this->assertAttributeEquals('foo', 'name', $this->securityDefinition);
        $this->assertEquals('foo', $this->securityDefinition->getName());
    }

    /**
     * @covers Epfremmer\SwaggerBundle\Entity\SecurityDefinition::getIn
     * @covers Epfremmer\SwaggerBundle\Entity\SecurityDefinition::setIn
     */
    public function testIn()
    {
        $this->assertClassHasAttribute('in', SecurityDefinition::class);
        $this->assertInstanceOf(SecurityDefinition::class, $this->securityDefinition->setIn('foo'));
        $this->assertAttributeEquals('foo', 'in', $this->securityDefinition);
        $this->assertEquals('foo', $this->securityDefinition->getIn());
    }

    /**
     * @covers Epfremmer\SwaggerBundle\Entity\SecurityDefinition::getFlow
     * @covers Epfremmer\SwaggerBundle\Entity\SecurityDefinition::setFlow
     */
    public function testFlow()
    {
        $this->assertClassHasAttribute('flow', SecurityDefinition::class);
        $this->assertInstanceOf(SecurityDefinition::class, $this->securityDefinition->setFlow('foo'));
        $this->assertAttributeEquals('foo', 'flow', $this->securityDefinition);
        $this->assertEquals('foo', $this->securityDefinition->getFlow());
    }

    /**
     * @covers Epfremmer\SwaggerBundle\Entity\SecurityDefinition::getAuthorizationUrl
     * @covers Epfremmer\SwaggerBundle\Entity\SecurityDefinition::setAuthorizationUrl
     */
    public function testAuthorizationUrl()
    {
        $this->assertClassHasAttribute('authorizationUrl', SecurityDefinition::class);
        $this->assertInstanceOf(SecurityDefinition::class, $this->securityDefinition->setAuthorizationUrl('foo'));
        $this->assertAttributeEquals('foo', 'authorizationUrl', $this->securityDefinition);
        $this->assertEquals('foo', $this->securityDefinition->getAuthorizationUrl());
    }

    /**
     * @covers Epfremmer\SwaggerBundle\Entity\SecurityDefinition::getTokenUrl
     * @covers Epfremmer\SwaggerBundle\Entity\SecurityDefinition::setTokenUrl
     */
    public function testTokenUrl()
    {
        $this->assertClassHasAttribute('tokenUrl', SecurityDefinition::class);
        $this->assertInstanceOf(SecurityDefinition::class, $this->securityDefinition->setTokenUrl('foo'));
        $this->assertAttributeEquals('foo', 'tokenUrl', $this->securityDefinition);
        $this->assertEquals('foo', $this->securityDefinition->getTokenUrl());
    }

    /**
     * @covers Epfremmer\SwaggerBundle\Entity\SecurityDefinition::getScopes
     * @covers Epfremmer\SwaggerBundle\Entity\SecurityDefinition::setScopes
     */
    public function testScopes()
    {
        $scopes = ['foo', 'bar', 'baz'];

        $this->assertClassHasAttribute('scopes', SecurityDefinition::class);
        $this->assertInstanceOf(SecurityDefinition::class, $this->securityDefinition->setScopes($scopes));
        $this->assertAttributeInternalType('array', 'scopes', $this->securityDefinition);
        $this->assertAttributeEquals($scopes, 'scopes', $this->securityDefinition);
        $this->assertEquals($scopes, $this->securityDefinition->getScopes());
    }

    /**
     * @covers Epfremmer\SwaggerBundle\Entity\SecurityDefinition
     */
    public function testDeserialize()
    {
        $data = json_encode([
            'type'             => 'foo',
            'description'      => 'bar',
            'name'             => 'baz',
            'in'               => 'qux',
            'flow'             => 'quux',
            'authorizationUrl' => 'corge',
            'tokenUrl'         => 'grault',
            'scopes' => [
                'foo',
                'bar',
                'baz'
            ],
        ]);

        $securityDefinition = self::$serializer->deserialize($data, SecurityDefinition::class, 'json');

        $this->assertInstanceOf(SecurityDefinition::class, $securityDefinition);
        $this->assertAttributeEquals('foo', 'type', $securityDefinition);
        $this->assertAttributeEquals('bar', 'description', $securityDefinition);
        $this->assertAttributeEquals('baz', 'name', $securityDefinition);
        $this->assertAttributeEquals('qux', 'in', $securityDefinition);
        $this->assertAttributeEquals('quux', 'flow', $securityDefinition);
        $this->assertAttributeEquals('corge', 'authorizationUrl', $securityDefinition);
        $this->assertAttributeEquals('grault', 'tokenUrl', $securityDefinition);
        $this->assertAttributeEquals(['foo', 'bar', 'baz'], 'scopes', $securityDefinition);
    }
}
