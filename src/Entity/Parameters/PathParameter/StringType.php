<?php
/**
 * File StringType.php
 *
 * @author Edward Pfremmer <epfremme@nerdery.com>
 */
namespace Epfremme\Swagger\Entity\Parameters\PathParameter;

use Epfremme\Swagger\Entity\Mixin\Primitives;
use Epfremme\Swagger\Entity\Parameters\AbstractTypedParameter;
use Epfremme\Swagger\Type\PathParameterInterface;
use Epfremme\Swagger\Type\StringTypeInterface;

/**
 * Class StringType
 *
 * @package Epfremme\Swagger
 * @subpackage Entity\Parameters\PathParameter
 */
class StringType extends AbstractTypedParameter implements PathParameterInterface, StringTypeInterface
{
    use Primitives\StringPrimitiveTrait;
}
