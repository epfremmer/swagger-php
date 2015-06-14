<?php
/**
 * File AbstractHeaderTest.php
 *
 * @author Edward Pfremmer <epfremme@nerdery.com>
 */
namespace Epfremmer\SwaggerBundle\Tests\Entity\Schemas;

use Epfremmer\SwaggerBundle\Entity\Headers\AbstractHeader;

/**
 * Class AbstractHeaderTest
 *
 * @package Epfremmer\SwaggerBundle
 * @subpackage Tests\Entity\Headers
 */
class AbstractHeaderTest extends \PHPUnit_Framework_TestCase
{

    /**
     * @var AbstractHeader|\PHPUnit_Framework_MockObject_MockObject
     */
    protected $mockHeader;

    /**
     * {@inheritdoc}
     */
    protected function setUp()
    {
        $this->mockHeader = $this->getMockForAbstractClass(AbstractHeader::class);
    }
}
