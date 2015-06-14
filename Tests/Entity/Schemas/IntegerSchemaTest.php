<?php
/**
 * File IntegerSchemaTest.php
 *
 * @author Edward Pfremmer <epfremme@nerdery.com>
 */
namespace Epfremmer\SwaggerBundle\Tests\Entity\Schemas;

use Epfremmer\SwaggerBundle\Entity\Schemas\AbstractSchema;
use Epfremmer\SwaggerBundle\Entity\Schemas\IntegerSchema;

/**
 * Class IntegerSchemaTest
 *
 * @package Epfremmer\SwaggerBundle
 * @subpackage Tests\Entity\Schemas
 */
class IntegerSchemaTest extends \PHPUnit_Framework_TestCase
{

    /**
     * @var IntegerSchema
     */
    protected $integerSchema;

    /**
     * {@inheritdoc}
     */
    protected function setUp()
    {
        $this->integerSchema = new IntegerSchema();
    }

    /**
     * @covers Epfremmer\SwaggerBundle\Entity\Schemas\IntegerSchema::getType
     */
    public function testType()
    {
        $this->assertNotEmpty($this->integerSchema->getType());
        $this->assertEquals(AbstractSchema::INTEGER_TYPE, $this->integerSchema->getType());
    }
}
