<?php
/**
 * File NumberType.php
 *
 * @author Edward Pfremmer <epfremme@nerdery.com>
 */
namespace Epfremme\Swagger\Entity\Parameters\QueryParameter;

use Epfremme\Swagger\Entity\Mixin\Primitives;
use Epfremme\Swagger\Entity\Parameters\AbstractTypedParameter;
use Epfremme\Swagger\Type\NumericTypeInterface;
use Epfremme\Swagger\Type\QueryParameterInterface;

/**
 * Class NumberType
 *
 * @package Epfremme\Swagger
 * @subpackage Entity\Parameters\QueryParameter
 */
class NumberType extends AbstractTypedParameter implements QueryParameterInterface, NumericTypeInterface
{
    use Primitives\NumericPrimitiveTrait;
}
