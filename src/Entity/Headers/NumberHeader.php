<?php
/**
 * File NumberHeader.php
 *
 * @author Edward Pfremmer <epfremme@nerdery.com>
 */
namespace Nerdery\Swagger\Entity\Headers;

use Nerdery\Swagger\Entity\Mixin\Primitives;

/**
 * Class NumberHeader
 *
 * @package Nerdery\Swagger
 * @subpackage Entity\Headers
 */
class NumberHeader extends AbstractHeader
{
    use Primitives\NumericPrimitiveTrait;

    /**
     * {@inheritdoc}
     */
    public function getType()
    {
        return AbstractHeader::NUMBER_TYPE;
    }
}