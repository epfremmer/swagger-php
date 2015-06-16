<?php
/**
 * File StringType.php
 *
 * @author Edward Pfremmer <epfremme@nerdery.com>
 */
namespace Epfremmer\SwaggerBundle\Entity\Parameters\QueryParameter;

use Epfremmer\SwaggerBundle\Entity\Mixin\Primitives;
use Epfremmer\SwaggerBundle\Entity\Parameters\AbstractTypedParameter;

/**
 * Class StringType
 *
 * @package Epfremmer\SwaggerBundle
 * @subpackage Entity\Parameters\QueryParameter
 */
class StringType extends AbstractTypedParameter
{
    use Primitives\StringPrimitiveTrait;
}