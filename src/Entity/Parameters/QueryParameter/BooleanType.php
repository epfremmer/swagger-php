<?php
/**
 * File BooleanType.php
 *
 * @author Edward Pfremmer <epfremme@nerdery.com>
 */
namespace Epfremme\Swagger\Entity\Parameters\QueryParameter;

use Epfremme\Swagger\Entity\Mixin\Primitives;
use Epfremme\Swagger\Entity\Parameters\AbstractTypedParameter;
use Epfremme\Swagger\Type\BooleanTypeInterface;
use Epfremme\Swagger\Type\QueryParameterInterface;

/**
 * Class BooleanType
 *
 * @package Epfremme\Swagger
 * @subpackage Entity\Parameters\QueryParameter
 */
class BooleanType extends AbstractTypedParameter implements QueryParameterInterface, BooleanTypeInterface
{
    use Primitives\BooleanPrimitiveTrait;
}
