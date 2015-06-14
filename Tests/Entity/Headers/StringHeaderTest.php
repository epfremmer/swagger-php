<?php
/**
 * File StringHeaderTest.php
 *
 * @author Edward Pfremmer <epfremme@nerdery.com>
 */
namespace Epfremmer\SwaggerBundle\Tests\Entity\Headers;

use Epfremmer\SwaggerBundle\Entity\Headers\StringHeader;

/**
 * Class StringHeaderTest
 *
 * @package Epfremmer\SwaggerBundle
 * @subpackage Tests\Entity\Headers
 */
class StringHeaderTest extends \PHPUnit_Framework_TestCase
{

    /**
     * @var StringHeader
     */
    protected $stringHeader;

    /**
     * {@inheritdoc}
     */
    protected function setUp()
    {
        $this->stringHeader = new StringHeader();
    }

    /** Empty */
    public function test()
    {
        $this->assertTrue(true);
    }
}
