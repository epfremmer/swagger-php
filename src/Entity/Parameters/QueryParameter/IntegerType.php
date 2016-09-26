<?php
/**
 * File IntegerType.php
 *
 * @author Edward Pfremmer <epfremme@nerdery.com>
 */
namespace Epfremme\Swagger\Entity\Parameters\QueryParameter;

use Epfremme\Swagger\Entity\Mixin\Primitives;
use Epfremme\Swagger\Entity\Parameters\AbstractTypedParameter;

/**
 * Class IntegerType
 *
 * @package Epfremme\Swagger
 * @subpackage Entity\Parameters\QueryParameter
 */
class IntegerType extends AbstractTypedParameter
{
    use Primitives\NumericPrimitiveTrait;
}
