<?php
/**
 * File ArrayType.php
 *
 * @author Edward Pfremmer <epfremme@nerdery.com>
 */
namespace Epfremme\Swagger\Entity\Parameters\QueryParameter;

use Epfremme\Swagger\Entity\Mixin\Primitives;
use Epfremme\Swagger\Entity\Parameters\AbstractTypedParameter;

/**
 * Class ArrayType
 *
 * @package Epfremme\Swagger
 * @subpackage Entity\Parameters\QueryParameter
 */
class ArrayType extends AbstractTypedParameter
{
    use Primitives\ArrayPrimitiveTrait;
}
