<?php
/**
 * File StringType.php
 *
 * @author Edward Pfremmer <epfremme@nerdery.com>
 */
namespace Epfremme\Swagger\Entity\Parameters\FormParameter;

use Epfremme\Swagger\Entity\Mixin\Primitives;
use Epfremme\Swagger\Entity\Parameters\AbstractTypedParameter;

/**
 * Class StringType
 *
 * @package Epfremme\Swagger
 * @subpackage Entity\Parameters\FormParameter
 */
class StringType extends AbstractTypedParameter
{
    use Primitives\StringPrimitiveTrait;
}
