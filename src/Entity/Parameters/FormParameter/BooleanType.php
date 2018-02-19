<?php
/**
 * File BooleanType.php
 *
 * @author Edward Pfremmer <epfremme@nerdery.com>
 */
namespace Epfremme\Swagger\Entity\Parameters\FormParameter;

use Epfremme\Swagger\Entity\Mixin\Primitives;
use Epfremme\Swagger\Entity\Parameters\AbstractTypedParameter;
use Epfremme\Swagger\Type\BooleanTypeInterface;
use Epfremme\Swagger\Type\FormParameterInterface;

/**
 * Class BooleanType
 *
 * @package Epfremme\Swagger
 * @subpackage Entity\Parameters\FormParameter
 */
class BooleanType extends AbstractTypedParameter implements FormParameterInterface, BooleanTypeInterface
{
    use Primitives\BooleanPrimitiveTrait;
}
