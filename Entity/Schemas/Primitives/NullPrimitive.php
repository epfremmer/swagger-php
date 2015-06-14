<?php
/**
 * File NullPrimitive.php
 *
 * @author Edward Pfremmer <epfremme@nerdery.com>
 */
namespace Epfremmer\SwaggerBundle\Entity\Schemas\Primitives;

use JMS\Serializer\Annotation as JMS;

/**
 * Trait NullPrimitive
 *
 * @package Epfremmer\SwaggerBundle
 * @subpackage Entity\Schemas\Primitives
 */
trait NullPrimitive
{
    use AnyPrimitive;
}