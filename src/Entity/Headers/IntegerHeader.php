<?php
/**
 * File IntegerHeader.php
 *
 * @author Edward Pfremmer <epfremme@nerdery.com>
 */
namespace ERP\Swagger\Entity\Headers;

use ERP\Swagger\Entity\Mixin\Primitives;

/**
 * Class IntegerHeader
 *
 * @package ERP\Swagger
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