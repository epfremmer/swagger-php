<?php
/**
 * File NumberHeader.php
 *
 * @author Edward Pfremmer <epfremme@nerdery.com>
 */
namespace Epfremmer\SwaggerBundle\Entity\Headers;

use Epfremmer\SwaggerBundle\Entity\Mixin\Primitives;

/**
 * Class NumberHeader
 *
 * @package Epfremmer\SwaggerBundle
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