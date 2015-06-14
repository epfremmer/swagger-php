<?php
/**
 * File BooleanPrimitiveTraitTest.php
 *
 * @author Edward Pfremmer <epfremme@nerdery.com>
 */
namespace Epfremmer\SwaggerBundle\Tests\Entity\Schemas\Primitives;

use Epfremmer\SwaggerBundle\Entity\Schemas\Primitives\BooleanPrimitive;

/**
 * Class BooleanPrimitiveTraitTest
 *
 * @package Epfremmer\SwaggerBundle
 * @subpackage Tests\Entity\Schemas\Primitives
 */
class BooleanPrimitiveTraitTest extends \PHPUnit_Framework_TestCase
{

    /**
     * @var BooleanPrimitive|\PHPUnit_Framework_MockObject_MockObject
     */
    protected $mockTrait;

    /**
     * Mock Classname
     * @var string
     */
    protected $mockClass;

    /**
     * {@inheritdoc}
     */
    protected function setUp()
    {
        $this->mockTrait = $this->getMockForTrait(BooleanPrimitive::class);
        $this->mockClass = get_class($this->mockTrait);
    }

    /** Empty */
    public function test()
    {
        $this->assertTrue(true);
    }
}
