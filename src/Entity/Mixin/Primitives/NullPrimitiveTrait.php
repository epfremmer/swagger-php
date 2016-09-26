<?php
/**
 * File NullPrimitiveTrait.php
 *
 * @author Edward Pfremmer <epfremme@nerdery.com>
 */
namespace Epfremme\Swagger\Entity\Mixin\Primitives;

use JMS\Serializer\Annotation as JMS;

/**
 * Trait NullPrimitiveTrait
 *
 * @package Epfremme\Swagger
 * @subpackage Entity\Schemas\Primitives
 */
trait NullPrimitiveTrait
{
    use AnyPrimitiveTrait;
}
