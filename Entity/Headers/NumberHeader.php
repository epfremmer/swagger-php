<?php
/**
 * File NumberHeader.php
 *
 * @author Edward Pfremmer <epfremme@nerdery.com>
 */
namespace ERP\Swagger\Entity\Headers;

use ERP\Swagger\Entity\Mixin\Primitives;

/**
 * Class NumberHeader
 *
 * @package ERP\Swagger
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