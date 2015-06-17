<?php
/**
 * File IntegerHeader.php
 *
 * @author Edward Pfremmer <epfremme@nerdery.com>
 */
namespace Epfremmer\SwaggerBundle\Entity\Headers;

use Epfremmer\SwaggerBundle\Entity\Mixin\Primitives;

/**
 * Class IntegerHeader
 *
 * @package Epfremmer\SwaggerBundle
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