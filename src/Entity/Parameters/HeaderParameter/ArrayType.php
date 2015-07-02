<?php
/**
 * File ArrayType.php
 *
 * @author Edward Pfremmer <epfremme@nerdery.com>
 */
namespace Nerdery\Swagger\Entity\Parameters\HeaderParameter;

use Nerdery\Swagger\Entity\Mixin\Primitives;
use Nerdery\Swagger\Entity\Parameters\AbstractTypedParameter;

/**
 * Class ArrayType
 *
 * @package Nerdery\Swagger
 * @subpackage Entity\Parameters\HeaderParameter
 */
class ArrayType extends AbstractTypedParameter
{
    use Primitives\ArrayPrimitiveTrait;
}