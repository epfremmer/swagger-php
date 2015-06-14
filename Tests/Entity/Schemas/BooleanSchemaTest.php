<?php
/**
 * File BooleanSchemaTest.php
 *
 * @author Edward Pfremmer <epfremme@nerdery.com>
 */
namespace Epfremmer\SwaggerBundle\Tests\Entity\Schemas;

use Epfremmer\SwaggerBundle\Entity\Schemas\AbstractSchema;
use Epfremmer\SwaggerBundle\Entity\Schemas\BooleanSchema;

/**
 * Class BooleanSchemaTest
 *
 * @package Epfremmer\SwaggerBundle
 * @subpackage Tests\Entity\Schemas
 */
class BooleanSchemaTest extends \PHPUnit_Framework_TestCase
{

    /**
     * @var BooleanSchema
     */
    protected $booleanSchema;

    /**
     * {@inheritdoc}
     */
    protected function setUp()
    {
        $this->booleanSchema = new BooleanSchema();
    }

    /**
     * @covers Epfremmer\SwaggerBundle\Entity\Schemas\BooleanSchema::getType
     */
    public function testType()
    {
        $this->assertNotEmpty($this->booleanSchema->getType());
        $this->assertEquals(AbstractSchema::BOOLEAN_TYPE, $this->booleanSchema->getType());
    }
}
