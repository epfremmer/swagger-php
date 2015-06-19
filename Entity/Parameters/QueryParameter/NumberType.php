<?php
/**
 * File NumberType.php
 *
 * @author Edward Pfremmer <epfremme@nerdery.com>
 */
namespace ERP\Swagger\Entity\Parameters\QueryParameter;

use ERP\Swagger\Entity\Mixin\Primitives;
use ERP\Swagger\Entity\Parameters\AbstractTypedParameter;

/**
 * Class NumberType
 *
 * @package ERP\Swagger
 * @subpackage Entity\Parameters\QueryParameter
 */
class NumberType extends AbstractTypedParameter
{
    use Primitives\NumericPrimitiveTrait;
}