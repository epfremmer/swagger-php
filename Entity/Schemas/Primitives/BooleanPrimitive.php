<?php
/**
 * File BooleanPrimitive.php
 *
 * @author Edward Pfremmer <epfremme@nerdery.com>
 */
namespace Epfremmer\SwaggerBundle\Entity\Schemas\Primitives;

use JMS\Serializer\Annotation as JMS;

/**
 * Trait BooleanPrimitive
 *
 * @package Epfremmer\SwaggerBundle
 * @subpackage Entity\Schemas\Primitives
 */
trait BooleanPrimitive
{
    use AnyPrimitive;
}