<?php
/**
 * File BooleanType.php
 *
 * @author Edward Pfremmer <epfremme@nerdery.com>
 */
namespace ERP\Swagger\Entity\Parameters\HeaderParameter;

use ERP\Swagger\Entity\Mixin\Primitives;
use ERP\Swagger\Entity\Parameters\AbstractTypedParameter;

/**
 * Class BooleanType
 *
 * @package ERP\Swagger
 * @subpackage Entity\Parameters\HeaderParameter
 */
class BooleanType extends AbstractTypedParameter
{
    use Primitives\BooleanPrimitiveTrait;
}