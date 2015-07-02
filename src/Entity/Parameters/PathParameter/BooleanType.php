<?php
/**
 * File BooleanType.php
 *
 * @author Edward Pfremmer <epfremme@nerdery.com>
 */
namespace Nerdery\Swagger\Entity\Parameters\PathParameter;

use Nerdery\Swagger\Entity\Mixin\Primitives;
use Nerdery\Swagger\Entity\Parameters\AbstractTypedParameter;

/**
 * Class BooleanType
 *
 * @package Nerdery\Swagger
 * @subpackage Entity\Parameters\PathParameter
 */
class BooleanType extends AbstractTypedParameter
{
    use Primitives\BooleanPrimitiveTrait;
}