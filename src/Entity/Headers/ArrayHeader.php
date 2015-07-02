<?php
/**
 * File ArrayHeader.php
 *
 * @author Edward Pfremmer <epfremme@nerdery.com>
 */
namespace Nerdery\Swagger\Entity\Headers;

use Nerdery\Swagger\Entity\Mixin\Primitives;

/**
 * Class ArrayHeader
 *
 * @package Nerdery\Swagger
 * @subpackage Entity\Headers
 */
class ArrayHeader extends AbstractHeader
{
    use Primitives\ArrayPrimitiveTrait;

    /**
     * {@inheritdoc}
     */
    public function getType()
    {
        return AbstractHeader::ARRAY_TYPE;
    }
}