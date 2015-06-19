<?php
/**
 * File SecurityDefinitionTest.php
 *
 * @author Edward Pfremmer <epfremme@nerdery.com>
 */
namespace ERP\Swagger\Tests\Entity;

use ERP\Swagger\Entity\SecurityDefinition;
use ERP\Swagger\Tests\Mixin\SerializerContextTrait;

/**
 * Class SecurityDefinitionTest
 *
 * @package ERP\Swagger
 * @subpackage Tests\Entity
 */
class SecurityDefinitionTest extends \PHPUnit_Framework_TestCase
{
    use SerializerContextTrait;

    /**
     * @var SecurityDefinition
     */
    protected $securityDefinition;

    /**
     * {@inheritdoc}
     */
    protected function setUp()
    {
        $this->securityDefinition = new SecurityDefinition();
    }

    /**
     * @covers ERP\Swagger\Entity\SecurityDefinition::getType
     * @covers ERP\Swagger\Entity\SecurityDefinition::setType
     */
    public function testType()
    {
        $this->assertClassHasAttribute('type', SecurityDefinition::class);
        $this->assertInstanceOf(SecurityDefinition::class, $this->securityDefinition->setType('foo'));
        $this->assertAttributeEquals('foo', 'type', $this->securityDefinition);
        $this->assertEquals('foo', $this->securityDefinition->getType());
    }

    /**
     * @covers ERP\Swagger\Entity\SecurityDefinition::getDescription
     * @covers ERP\Swagger\Entity\SecurityDefinition::setDescription
     */
    public function testDescription()
    {
        $this->assertClassHasAttribute('description', SecurityDefinition::class);
        $this->assertInstanceOf(SecurityDefinition::class, $this->securityDefinition->setDescription('foo'));
        $this->assertAttributeEquals('foo', 'description', $this->securityDefinition);
        $this->assertEquals('foo', $this->securityDefinition->getDescription());
    }

    /**
     * @covers ERP\Swagger\Entity\SecurityDefinition::getName
     * @covers ERP\Swagger\Entity\SecurityDefinition::setName
     */
    public function testName()
    {
        $this->assertClassHasAttribute('name', SecurityDefinition::class);
        $this->assertInstanceOf(SecurityDefinition::class, $this->securityDefinition->setName('foo'));
        $this->assertAttributeEquals('foo', 'name', $this->securityDefinition);
        $this->assertEquals('foo', $this->securityDefinition->getName());
    }

    /**
     * @covers ERP\Swagger\Entity\SecurityDefinition::getIn
     * @covers ERP\Swagger\Entity\SecurityDefinition::setIn
     */
    public function testIn()
    {
        $this->assertClassHasAttribute('in', SecurityDefinition::class);
        $this->assertInstanceOf(SecurityDefinition::class, $this->securityDefinition->setIn('foo'));
        $this->assertAttributeEquals('foo', 'in', $this->securityDefinition);
        $this->assertEquals('foo', $this->securityDefinition->getIn());
    }

    /**
     * @covers ERP\Swagger\Entity\SecurityDefinition::getFlow
     * @covers ERP\Swagger\Entity\SecurityDefinition::setFlow
     */
    public function testFlow()
    {
        $this->assertClassHasAttribute('flow', SecurityDefinition::class);
        $this->assertInstanceOf(SecurityDefinition::class, $this->securityDefinition->setFlow('foo'));
        $this->assertAttributeEquals('foo', 'flow', $this->securityDefinition);
        $this->assertEquals('foo', $this->securityDefinition->getFlow());
    }

    /**
     * @covers ERP\Swagger\Entity\SecurityDefinition::getAuthorizationUrl
     * @covers ERP\Swagger\Entity\SecurityDefinition::setAuthorizationUrl
     */
    public function testAuthorizationUrl()
    {
        $this->assertClassHasAttribute('authorizationUrl', SecurityDefinition::class);
        $this->assertInstanceOf(SecurityDefinition::class, $this->securityDefinition->setAuthorizationUrl('foo'));
        $this->assertAttributeEquals('foo', 'authorizationUrl', $this->securityDefinition);
        $this->assertEquals('foo', $this->securityDefinition->getAuthorizationUrl());
    }

    /**
     * @covers ERP\Swagger\Entity\SecurityDefinition::getTokenUrl
     * @covers ERP\Swagger\Entity\SecurityDefinition::setTokenUrl
     */
    public function testTokenUrl()
    {
        $this->assertClassHasAttribute('tokenUrl', SecurityDefinition::class);
        $this->assertInstanceOf(SecurityDefinition::class, $this->securityDefinition->setTokenUrl('foo'));
        $this->assertAttributeEquals('foo', 'tokenUrl', $this->securityDefinition);
        $this->assertEquals('foo', $this->securityDefinition->getTokenUrl());
    }

    /**
     * @covers ERP\Swagger\Entity\SecurityDefinition::getScopes
     * @covers ERP\Swagger\Entity\SecurityDefinition::setScopes
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
     * @covers ERP\Swagger\Entity\SecurityDefinition
     */
    public function testSerialize()
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

        $securityDefinition = $this->getSerializer()->deserialize($data, SecurityDefinition::class, 'json');

        $this->assertInstanceOf(SecurityDefinition::class, $securityDefinition);
        $this->assertAttributeEquals('foo', 'type', $securityDefinition);
        $this->assertAttributeEquals('bar', 'description', $securityDefinition);
        $this->assertAttributeEquals('baz', 'name', $securityDefinition);
        $this->assertAttributeEquals('qux', 'in', $securityDefinition);
        $this->assertAttributeEquals('quux', 'flow', $securityDefinition);
        $this->assertAttributeEquals('corge', 'authorizationUrl', $securityDefinition);
        $this->assertAttributeEquals('grault', 'tokenUrl', $securityDefinition);
        $this->assertAttributeEquals(['foo', 'bar', 'baz'], 'scopes', $securityDefinition);

        $json = $this->getSerializer()->serialize($securityDefinition, 'json');

        $this->assertJson($json);
        $this->assertJsonStringEqualsJsonString($data, $json);
    }
}
