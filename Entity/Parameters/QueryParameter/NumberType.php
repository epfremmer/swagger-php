<?php
/**
 * File NumberType.php
 *
 * @author Edward Pfremmer <epfremme@nerdery.com>
 */
namespace Epfremmer\SwaggerBundle\Entity\Parameters\QueryParameter;

use Epfremmer\SwaggerBundle\Entity\Mixin\Primitives;
use Epfremmer\SwaggerBundle\Entity\Parameters\AbstractTypedParameter;

/**
 * Class NumberType
 *
 * @package Epfremmer\SwaggerBundle
 * @subpackage Entity\Parameters\QueryParameter
 */
class NumberType extends AbstractTypedParameter
{
    use Primitives\NumericPrimitiveTrait;
}