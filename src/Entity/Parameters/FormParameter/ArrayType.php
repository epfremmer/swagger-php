<?php
/**
 * File ArrayType.php
 *
 * @author Edward Pfremmer <epfremme@nerdery.com>
 */
namespace Epfremme\Swagger\Entity\Parameters\FormParameter;

use Epfremme\Swagger\Entity\Mixin\Primitives;
use Epfremme\Swagger\Entity\Parameters\AbstractTypedParameter;
use Epfremme\Swagger\Type\ArrayTypeInterface;
use Epfremme\Swagger\Type\FormParameterInterface;

/**
 * Class ArrayType
 *
 * @package Epfremme\Swagger
 * @subpackage Entity\Parameters\FormParameter
 */
class ArrayType extends AbstractTypedParameter implements FormParameterInterface, ArrayTypeInterface
{
    use Primitives\ArrayPrimitiveTrait;
}
