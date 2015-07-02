<?php
/**
 * File StringType.php
 *
 * @author Edward Pfremmer <epfremme@nerdery.com>
 */
namespace Nerdery\Swagger\Entity\Parameters\QueryParameter;

use Nerdery\Swagger\Entity\Mixin\Primitives;
use Nerdery\Swagger\Entity\Parameters\AbstractTypedParameter;

/**
 * Class StringType
 *
 * @package Nerdery\Swagger
 * @subpackage Entity\Parameters\QueryParameter
 */
class StringType extends AbstractTypedParameter
{
    use Primitives\StringPrimitiveTrait;
}