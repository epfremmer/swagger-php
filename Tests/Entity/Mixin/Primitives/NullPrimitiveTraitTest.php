<?php
/**
 * File NullPrimitiveTraitTest.php
 *
 * @author Edward Pfremmer <epfremme@nerdery.com>
 */
namespace Epfremmer\SwaggerBundle\Tests\Entity\Mixin;

use Epfremmer\SwaggerBundle\Entity\Mixin\Primitives\NullPrimitiveTrait;

/**
 * Class NullPrimitiveTraitTest
 *
 * @package Epfremmer\SwaggerBundle
 * @subpackage Tests\Entity\Schemas\Primitives
 */
class NullPrimitiveTraitTest extends \PHPUnit_Framework_TestCase
{

    /**
     * @var NullPrimitiveTrait|\PHPUnit_Framework_MockObject_MockObject
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
        $this->mockTrait = $this->getMockForTrait(NullPrimitiveTrait::class);
        $this->mockClass = get_class($this->mockTrait);
    }

    /** Empty Class */
    public function test() {}
}
