<?php
/**
 * File IntegerHeader.php
 *
 * @author Edward Pfremmer <epfremme@nerdery.com>
 */
namespace Nerdery\Swagger\Entity\Headers;

use Nerdery\Swagger\Entity\Mixin\Primitives;

/**
 * Class IntegerHeader
 *
 * @package Nerdery\Swagger
 * @subpackage Entity\Headers
 */
class IntegerHeader extends AbstractHeader
{
    use Primitives\NumericPrimitiveTrait;

    /**
     * {@inheritdoc}
     */
    public function getType()
    {
        return AbstractHeader::INTEGER_TYPE;
    }
}