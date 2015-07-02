<?php
/**
 * File NullPrimitiveTrait.php
 *
 * @author Edward Pfremmer <epfremme@nerdery.com>
 */
namespace Nerdery\Swagger\Entity\Mixin\Primitives;

use JMS\Serializer\Annotation as JMS;

/**
 * Trait NullPrimitiveTrait
 *
 * @package Nerdery\Swagger
 * @subpackage Entity\Schemas\Primitives
 */
trait NullPrimitiveTrait
{
    use AnyPrimitiveTrait;
}