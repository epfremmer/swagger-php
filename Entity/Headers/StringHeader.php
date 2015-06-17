<?php
/**
 * File StringHeader.php
 *
 * @author Edward Pfremmer <epfremme@nerdery.com>
 */
namespace Epfremmer\SwaggerBundle\Entity\Headers;

use Epfremmer\SwaggerBundle\Entity\Mixin\Primitives;

/**
 * Class StringHeader
 *
 * @package Epfremmer\SwaggerBundle
 * @subpackage Entity\Headers
 */
class StringHeader extends AbstractHeader
{
    use Primitives\StringPrimitiveTrait;

    /**
     * {@inheritdoc}
     */
    public function getType()
    {
        return AbstractHeader::STRING_TYPE;
    }
}