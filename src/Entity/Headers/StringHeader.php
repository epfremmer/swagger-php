<?php
/**
 * File StringHeader.php
 *
 * @author Edward Pfremmer <epfremme@nerdery.com>
 */
namespace Nerdery\Swagger\Entity\Headers;

use Nerdery\Swagger\Entity\Mixin\Primitives;

/**
 * Class StringHeader
 *
 * @package Nerdery\Swagger
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