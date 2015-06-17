<?php
/**
 * File FileType.php
 *
 * @author Edward Pfremmer <epfremme@nerdery.com>
 */
namespace Epfremmer\SwaggerBundle\Entity\Parameters\FormParameter;

use Epfremmer\SwaggerBundle\Entity\Mixin\Primitives;
use Epfremmer\SwaggerBundle\Entity\Parameters\AbstractTypedParameter;

/**
 * Class FileType
 *
 * @package Epfremmer\SwaggerBundle
 * @subpackage Entity\Parameters\FormParameter
 */
class FileType extends AbstractTypedParameter
{
    use Primitives\BooleanPrimitiveTrait;
}