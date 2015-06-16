<?php
/**
 * File ArrayType.php
 *
 * @author Edward Pfremmer <epfremme@nerdery.com>
 */
namespace Epfremmer\SwaggerBundle\Entity\Parameters\QueryParameter;

use Epfremmer\SwaggerBundle\Entity\Mixin\Primitives;
use Epfremmer\SwaggerBundle\Entity\Parameters\AbstractTypedParameter;

/**
 * Class ArrayType
 *
 * @package Epfremmer\SwaggerBundle
 * @subpackage Entity\Parameters\QueryParameter
 */
class ArrayType extends AbstractTypedParameter
{
    use Primitives\ArrayPrimitiveTrait;
}