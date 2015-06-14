<?php
/**
 * File RefSchemaTest.php
 *
 * @author Edward Pfremmer <epfremme@nerdery.com>
 */
namespace Epfremmer\SwaggerBundle\Tests\Entity\Schemas;

use Epfremmer\SwaggerBundle\Entity\Schemas\AbstractSchema;
use Epfremmer\SwaggerBundle\Entity\Schemas\RefSchema;

/**
 * Class RefSchemaTest
 *
 * @package Epfremmer\SwaggerBundle
 * @subpackage Tests\Entity\Schemas
 */
class RefSchemaTest extends \PHPUnit_Framework_TestCase
{

    /**
     * @var RefSchema
     */
    protected $refSchema;

    /**
     * {@inheritdoc}
     */
    protected function setUp()
    {
        $this->refSchema = new RefSchema();
    }

    /**
     * @covers Epfremmer\SwaggerBundle\Entity\Schemas\RefSchema::getType
     */
    public function testType()
    {
        $this->assertNotEmpty($this->refSchema->getType());
        $this->assertEquals(AbstractSchema::REF_TYPE, $this->refSchema->getType());
    }

    /**
     * @covers Epfremmer\SwaggerBundle\Entity\Schemas\RefSchema::getRef
     * @covers Epfremmer\SwaggerBundle\Entity\Schemas\RefSchema::setRef
     */
    public function testRef()
    {
        $this->assertClassHasAttribute('ref', RefSchema::class);
        $this->assertInstanceOf(RefSchema::class, $this->refSchema->setRef('#/foo'));
        $this->assertAttributeEquals('#/foo', 'ref', $this->refSchema);
        $this->assertEquals('#/foo', $this->refSchema->getRef());
    }
}
