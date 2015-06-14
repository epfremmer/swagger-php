<?php
/**
 * File ArrayHeaderTest.php
 *
 * @author Edward Pfremmer <epfremme@nerdery.com>
 */
namespace Epfremmer\SwaggerBundle\Tests\Entity\Schemas;

use Epfremmer\SwaggerBundle\Entity\Headers\ArrayHeader;

/**
 * Class ArrayHeaderTest
 *
 * @package Epfremmer\SwaggerBundle
 * @subpackage Tests\Entity\Headers
 */
class ArrayHeaderTest extends \PHPUnit_Framework_TestCase
{

    /**
     * @var ArrayHeader
     */
    protected $arrayHeader;

    /**
     * {@inheritdoc}
     */
    protected function setUp()
    {
        $this->arrayHeader = new ArrayHeader();
    }
}
