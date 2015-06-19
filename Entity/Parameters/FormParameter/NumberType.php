<?php
/**
 * File NumberType.php
 *
 * @author Edward Pfremmer <epfremme@nerdery.com>
 */
namespace ERP\Swagger\Entity\Parameters\FormParameter;

use ERP\Swagger\Entity\Mixin\Primitives;
use ERP\Swagger\Entity\Parameters\AbstractTypedParameter;

/**
 * Class NumberType
 *
 * @package ERP\Swagger
 * @subpackage Entity\Parameters\FormParameter
 */
class NumberType extends AbstractTypedParameter
{
    use Primitives\NumericPrimitiveTrait;
}