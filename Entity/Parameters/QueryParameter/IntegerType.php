<?php
/**
 * File IntegerType.php
 *
 * @author Edward Pfremmer <epfremme@nerdery.com>
 */
namespace Epfremmer\SwaggerBundle\Entity\Parameters\QueryParameter;

use Epfremmer\SwaggerBundle\Entity\Mixin\Primitives;
use Epfremmer\SwaggerBundle\Entity\Parameters\AbstractTypedParameter;

/**
 * Class IntegerType
 *
 * @package Epfremmer\SwaggerBundle
 * @subpackage Entity\Parameters\QueryParameter
 */
class IntegerType extends AbstractTypedParameter
{
    use Primitives\NumericPrimitiveTrait;
}