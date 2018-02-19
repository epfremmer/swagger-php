<?php
/**
 * File StringType.php
 *
 * @author Edward Pfremmer <epfremme@nerdery.com>
 */
namespace Epfremme\Swagger\Entity\Parameters\QueryParameter;

use Epfremme\Swagger\Entity\Mixin\Primitives;
use Epfremme\Swagger\Entity\Parameters\AbstractTypedParameter;
use Epfremme\Swagger\Type\QueryParameterInterface;
use Epfremme\Swagger\Type\StringTypeInterface;

/**
 * Class StringType
 *
 * @package Epfremme\Swagger
 * @subpackage Entity\Parameters\QueryParameter
 */
class StringType extends AbstractTypedParameter implements QueryParameterInterface, StringTypeInterface
{
    use Primitives\StringPrimitiveTrait;
}
