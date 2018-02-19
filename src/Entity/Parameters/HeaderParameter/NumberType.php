<?php
/**
 * File NumberType.php
 *
 * @author Edward Pfremmer <epfremme@nerdery.com>
 */
namespace Epfremme\Swagger\Entity\Parameters\HeaderParameter;

use Epfremme\Swagger\Entity\Mixin\Primitives;
use Epfremme\Swagger\Entity\Parameters\AbstractTypedParameter;
use Epfremme\Swagger\Type\HeaderParameterInterface;
use Epfremme\Swagger\Type\NumericTypeInterface;

/**
 * Class NumberType
 *
 * @package Epfremme\Swagger
 * @subpackage Entity\Parameters\HeaderParameter
 */
class NumberType extends AbstractTypedParameter implements HeaderParameterInterface, NumericTypeInterface
{
    use Primitives\NumericPrimitiveTrait;
}
