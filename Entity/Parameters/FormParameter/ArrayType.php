<?php
/**
 * File ArrayType.php
 *
 * @author Edward Pfremmer <epfremme@nerdery.com>
 */
namespace Epfremmer\SwaggerBundle\Entity\Parameters\FormParameter;

use Epfremmer\SwaggerBundle\Entity\Mixin\Primitives;
use Epfremmer\SwaggerBundle\Entity\Parameters\AbstractTypedParameter;

/**
 * Class ArrayType
 *
 * @package Epfremmer\SwaggerBundle
 * @subpackage Entity\Parameters\FormParameter
 */
class ArrayType extends AbstractTypedParameter
{
    use Primitives\ArrayPrimitiveTrait;
}