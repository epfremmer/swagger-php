<?php
/**
 * File ArrayHeader.php
 *
 * @author Edward Pfremmer <epfremme@nerdery.com>
 */
namespace Epfremme\Swagger\Entity\Headers;

use Epfremme\Swagger\Entity\Mixin\Primitives;

/**
 * Class ArrayHeader
 *
 * @package Epfremme\Swagger
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
