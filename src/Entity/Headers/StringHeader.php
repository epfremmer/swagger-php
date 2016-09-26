<?php
/**
 * File StringHeader.php
 *
 * @author Edward Pfremmer <epfremme@nerdery.com>
 */
namespace Epfremme\Swagger\Entity\Headers;

use Epfremme\Swagger\Entity\Mixin\Primitives;

/**
 * Class StringHeader
 *
 * @package Epfremme\Swagger
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
