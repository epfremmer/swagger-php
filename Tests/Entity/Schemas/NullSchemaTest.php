<?php
/**
 * File NullSchemaTest.php
 *
 * @author Edward Pfremmer <epfremme@nerdery.com>
 */
namespace Epfremmer\SwaggerBundle\Tests\Entity\Schemas;

use Epfremmer\SwaggerBundle\Entity\Schemas\AbstractSchema;
use Epfremmer\SwaggerBundle\Entity\Schemas\NullSchema;

/**
 * Class NullSchemaTest
 *
 * @package Epfremmer\SwaggerBundle
 * @subpackage Tests\Entity\Schemas
 */
class NullSchemaTest extends \PHPUnit_Framework_TestCase
{

    /**
     * @var NullSchema
     */
    protected $nullSchema;

    /**
     * {@inheritdoc}
     */
    protected function setUp()
    {
        $this->nullSchema = new NullSchema();
    }

    /**
     * @covers Epfremmer\SwaggerBundle\Entity\Schemas\NullSchema::getType
     */
    public function testType()
    {
        $this->assertNotEmpty($this->nullSchema->getType());
        $this->assertEquals(AbstractSchema::NULL_TYPE, $this->nullSchema->getType());
    }
}
