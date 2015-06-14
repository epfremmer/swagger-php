<?php
/**
 * File NumberSchemaTest.php
 *
 * @author Edward Pfremmer <epfremme@nerdery.com>
 */
namespace Epfremmer\SwaggerBundle\Tests\Entity\Schemas;

use Epfremmer\SwaggerBundle\Entity\Schemas\AbstractSchema;
use Epfremmer\SwaggerBundle\Entity\Schemas\NumberSchema;

/**
 * Class NumberSchemaTest
 *
 * @package Epfremmer\SwaggerBundle
 * @subpackage Tests\Entity\Schemas
 */
class NumberSchemaTest extends \PHPUnit_Framework_TestCase
{

    /**
     * @var NumberSchema
     */
    protected $numberSchema;

    /**
     * {@inheritdoc}
     */
    protected function setUp()
    {
        $this->numberSchema = new NumberSchema();
    }

    /**
     * @covers Epfremmer\SwaggerBundle\Entity\Schemas\NumberSchema::getType
     */
    public function testType()
    {
        $this->assertNotEmpty($this->numberSchema->getType());
        $this->assertEquals(AbstractSchema::NUMBER_TYPE, $this->numberSchema->getType());
    }
}
