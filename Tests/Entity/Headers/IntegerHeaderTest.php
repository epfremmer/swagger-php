<?php
/**
 * File IntegerHeaderTest.php
 *
 * @author Edward Pfremmer <epfremme@nerdery.com>
 */
namespace Epfremmer\SwaggerBundle\Tests\Entity\Headers;

use Epfremmer\SwaggerBundle\Entity\Headers\IntegerHeader;

/**
 * Class IntegerHeaderTest
 *
 * @package Epfremmer\SwaggerBundle
 * @subpackage Tests\Entity\Headers
 */
class IntegerHeaderTest extends \PHPUnit_Framework_TestCase
{

    /**
     * @var IntegerHeader
     */
    protected $integerHeader;

    /**
     * {@inheritdoc}
     */
    protected function setUp()
    {
        $this->integerHeader = new IntegerHeader();
    }

    /** Empty */
    public function test()
    {
        $this->assertTrue(true);
    }
}
