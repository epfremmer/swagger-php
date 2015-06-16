<?php
/**
 * File BooleanHeader.php
 *
 * @author Edward Pfremmer <epfremme@nerdery.com>
 */
namespace Epfremmer\SwaggerBundle\Entity\Headers;

use Epfremmer\SwaggerBundle\Entity\Mixin\Primitives;


/**
 * Class BooleanHeader
 *
 * @package Epfremmer\SwaggerBundle
 * @subpackage Entity\Headers
 */
class BooleanHeader extends AbstractHeader
{
    use Primitives\BooleanPrimitiveTrait;

    /**
     * {@inheritdoc}
     */
    public function getType()
    {
        return AbstractHeader::BOOLEAN_TYPE;
    }
}