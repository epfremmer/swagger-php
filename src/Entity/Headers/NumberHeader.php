<?php
/**
 * File NumberHeader.php
 *
 * @author Edward Pfremmer <epfremme@nerdery.com>
 */
namespace Epfremme\Swagger\Entity\Headers;

use Epfremme\Swagger\Entity\Mixin\Primitives;

/**
 * Class NumberHeader
 *
 * @package Epfremme\Swagger
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
