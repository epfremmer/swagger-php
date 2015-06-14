<?php
/**
 * File BooleanHeaderTest.php
 *
 * @author Edward Pfremmer <epfremme@nerdery.com>
 */
namespace Epfremmer\SwaggerBundle\Tests\Entity\Schemas;

use Epfremmer\SwaggerBundle\Entity\Headers\BooleanHeader;

/**
 * Class BooleanHeaderTest
 *
 * @package Epfremmer\SwaggerBundle
 * @subpackage Tests\Entity\Headers
 */
class BooleanHeaderTest extends \PHPUnit_Framework_TestCase
{

    /**
     * @var BooleanHeader
     */
    protected $booleanHeader;

    /**
     * {@inheritdoc}
     */
    protected function setUp()
    {
        $this->booleanHeader = new BooleanHeader();
    }
}
