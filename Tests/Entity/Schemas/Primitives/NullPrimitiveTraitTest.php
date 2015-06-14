<?php
/**
 * File NullPrimitiveTraitTest.php
 *
 * @author Edward Pfremmer <epfremme@nerdery.com>
 */
namespace Epfremmer\SwaggerBundle\Tests\Entity\Schemas\Primitives;

use Epfremmer\SwaggerBundle\Entity\Schemas\Primitives\NullPrimitive;

/**
 * Class NullPrimitiveTraitTest
 *
 * @package Epfremmer\SwaggerBundle
 * @subpackage Tests\Entity\Schemas\Primitives
 */
class NullPrimitiveTraitTest extends \PHPUnit_Framework_TestCase
{

    /**
     * @var NullPrimitive|\PHPUnit_Framework_MockObject_MockObject
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
        $this->mockTrait = $this->getMockForTrait(NullPrimitive::class);
        $this->mockClass = get_class($this->mockTrait);
    }
}
