<?php
/**
 * File ObjectSchemaTest.php
 *
 * @author Edward Pfremmer <epfremme@nerdery.com>
 */
namespace Epfremmer\SwaggerBundle\Tests\Entity\Schemas;

use Epfremmer\SwaggerBundle\Entity\Schemas\AbstractSchema;
use Epfremmer\SwaggerBundle\Entity\Schemas\ObjectSchema;

/**
 * Class ObjectSchemaTest
 *
 * @package Epfremmer\SwaggerBundle
 * @subpackage Tests\Entity\Schemas
 */
class ObjectSchemaTest extends \PHPUnit_Framework_TestCase
{

    /**
     * @var ObjectSchema
     */
    protected $objectSchema;

    /**
     * {@inheritdoc}
     */
    protected function setUp()
    {
        $this->objectSchema = new ObjectSchema();
    }

    /**
     * @covers Epfremmer\SwaggerBundle\Entity\Schemas\ObjectSchema::getType
     */
    public function testType()
    {
        $this->assertNotEmpty($this->objectSchema->getType());
        $this->assertEquals(AbstractSchema::OBJECT_TYPE, $this->objectSchema->getType());
    }
}
