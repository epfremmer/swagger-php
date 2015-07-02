<?php
/**
 * File NumberType.php
 *
 * @author Edward Pfremmer <epfremme@nerdery.com>
 */
namespace Nerdery\Swagger\Entity\Parameters\QueryParameter;

use Nerdery\Swagger\Entity\Mixin\Primitives;
use Nerdery\Swagger\Entity\Parameters\AbstractTypedParameter;

/**
 * Class NumberType
 *
 * @package Nerdery\Swagger
 * @subpackage Entity\Parameters\QueryParameter
 */
class NumberType extends AbstractTypedParameter
{
    use Primitives\NumericPrimitiveTrait;
}