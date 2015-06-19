<?php
/**
 * File StringHeader.php
 *
 * @author Edward Pfremmer <epfremme@nerdery.com>
 */
namespace ERP\Swagger\Entity\Headers;

use ERP\Swagger\Entity\Mixin\Primitives;

/**
 * Class StringHeader
 *
 * @package ERP\Swagger
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