<?php
/**
 * File NumberHeaderTest.php
 *
 * @author Edward Pfremmer <epfremme@nerdery.com>
 */
namespace Epfremmer\SwaggerBundle\Tests\Entity\Schemas;

use Epfremmer\SwaggerBundle\Entity\Headers\NumberHeader;

/**
 * Class NumberHeaderTest
 *
 * @package Epfremmer\SwaggerBundle
 * @subpackage Tests\Entity\Headers
 */
class NumberHeaderTest extends \PHPUnit_Framework_TestCase
{

    /**
     * @var NumberHeader
     */
    protected $numberHeader;

    /**
     * {@inheritdoc}
     */
    protected function setUp()
    {
        $this->numberHeader = new NumberHeader();
    }
}
