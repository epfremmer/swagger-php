<?php
/**
 * File ArrayHeader.php
 *
 * @author Edward Pfremmer <epfremme@nerdery.com>
 */
namespace ERP\Swagger\Entity\Headers;

use ERP\Swagger\Entity\Mixin\Primitives;

/**
 * Class ArrayHeader
 *
 * @package ERP\Swagger
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