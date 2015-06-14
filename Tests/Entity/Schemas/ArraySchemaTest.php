<?php
/**
 * File ArraySchemaTest.php
 *
 * @author Edward Pfremmer <epfremme@nerdery.com>
 */
namespace Epfremmer\SwaggerBundle\Tests\Entity\Schemas;

use Epfremmer\SwaggerBundle\Entity\ExternalDocumentation;
use Epfremmer\SwaggerBundle\Entity\Schemas\AbstractSchema;
use Epfremmer\SwaggerBundle\Entity\Schemas\ArraySchema;

/**
 * Class ArraySchemaTest
 *
 * @package Epfremmer\SwaggerBundle
 * @subpackage Tests\Entity\Schemas
 */
class ArraySchemaTest extends \PHPUnit_Framework_TestCase
{

    /**
     * @var ArraySchema
     */
    protected $arraySchema;

    /**
     * {@inheritdoc}
     */
    protected function setUp()
    {
        $this->arraySchema = new ArraySchema();
    }

    /**
     * @covers Epfremmer\SwaggerBundle\Entity\Schemas\ArraySchema::getType
     */
    public function testType()
    {
        $this->assertNotEmpty($this->arraySchema->getType());
        $this->assertEquals(AbstractSchema::ARRAY_TYPE, $this->arraySchema->getType());
    }
}
