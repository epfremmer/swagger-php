<?php
/**
 * File ArrayType.php
 *
 * @author Edward Pfremmer <epfremme@nerdery.com>
 */
namespace ERP\Swagger\Entity\Parameters\HeaderParameter;

use ERP\Swagger\Entity\Mixin\Primitives;
use ERP\Swagger\Entity\Parameters\AbstractTypedParameter;

/**
 * Class ArrayType
 *
 * @package ERP\Swagger
 * @subpackage Entity\Parameters\HeaderParameter
 */
class ArrayType extends AbstractTypedParameter
{
    use Primitives\ArrayPrimitiveTrait;
}