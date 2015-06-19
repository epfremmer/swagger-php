<?php
/**
 * File BooleanHeader.php
 *
 * @author Edward Pfremmer <epfremme@nerdery.com>
 */
namespace ERP\Swagger\Entity\Headers;

use ERP\Swagger\Entity\Mixin\Primitives;


/**
 * Class BooleanHeader
 *
 * @package ERP\Swagger
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