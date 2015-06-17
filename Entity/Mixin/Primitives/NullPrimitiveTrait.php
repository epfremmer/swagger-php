<?php
/**
 * File NullPrimitiveTrait.php
 *
 * @author Edward Pfremmer <epfremme@nerdery.com>
 */
namespace Epfremmer\SwaggerBundle\Entity\Mixin\Primitives;

use JMS\Serializer\Annotation as JMS;

/**
 * Trait NullPrimitiveTrait
 *
 * @package Epfremmer\SwaggerBundle
 * @subpackage Entity\Schemas\Primitives
 */
trait NullPrimitiveTrait
{
    use AnyPrimitiveTrait;
}