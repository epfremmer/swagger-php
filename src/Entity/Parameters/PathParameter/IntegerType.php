<?php
/**
 * File IntegerType.php
 *
 * @author Edward Pfremmer <epfremme@nerdery.com>
 */
namespace Epfremme\Swagger\Entity\Parameters\PathParameter;

use Epfremme\Swagger\Entity\Mixin\Primitives;
use Epfremme\Swagger\Entity\Parameters\AbstractTypedParameter;

/**
 * Class IntegerType
 *
 * @package Epfremme\Swagger
 * @subpackage Entity\Parameters\PathParameter
 */
class IntegerType extends AbstractTypedParameter
{
    use Primitives\NumericPrimitiveTrait;
}
