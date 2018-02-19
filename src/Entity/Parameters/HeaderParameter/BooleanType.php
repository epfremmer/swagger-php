<?php
/**
 * File BooleanType.php
 *
 * @author Edward Pfremmer <epfremme@nerdery.com>
 */
namespace Epfremme\Swagger\Entity\Parameters\HeaderParameter;

use Epfremme\Swagger\Entity\Mixin\Primitives;
use Epfremme\Swagger\Entity\Parameters\AbstractTypedParameter;
use Epfremme\Swagger\Type\BooleanTypeInterface;
use Epfremme\Swagger\Type\HeaderParameterInterface;

/**
 * Class BooleanType
 *
 * @package Epfremme\Swagger
 * @subpackage Entity\Parameters\HeaderParameter
 */
class BooleanType extends AbstractTypedParameter implements HeaderParameterInterface, BooleanTypeInterface
{
    use Primitives\BooleanPrimitiveTrait;
}
