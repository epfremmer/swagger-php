<?php
/**
 * File StringSchemaTest.php
 *
 * @author Edward Pfremmer <epfremme@nerdery.com>
 */
namespace Epfremmer\SwaggerBundle\Tests\Entity\Schemas;

use Epfremmer\SwaggerBundle\Entity\Schemas\AbstractSchema;
use Epfremmer\SwaggerBundle\Entity\Schemas\StringSchema;

/**
 * Class StringSchemaTest
 *
 * @package Epfremmer\SwaggerBundle
 * @subpackage Tests\Entity\Schemas
 */
class StringSchemaTest extends \PHPUnit_Framework_TestCase
{

    /**
     * @var StringSchema
     */
    protected $stringSchema;

    /**
     * {@inheritdoc}
     */
    protected function setUp()
    {
        $this->stringSchema = new StringSchema();
    }

    /**
     * @covers Epfremmer\SwaggerBundle\Entity\Schemas\StringSchema::getType
     */
    public function testType()
    {
        $this->assertNotEmpty($this->stringSchema->getType());
        $this->assertEquals(AbstractSchema::STRING_TYPE, $this->stringSchema->getType());
    }
}
