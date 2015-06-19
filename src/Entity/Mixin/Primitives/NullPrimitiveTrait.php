<?php
/**
 * File NullPrimitiveTrait.php
 *
 * @author Edward Pfremmer <epfremme@nerdery.com>
 */
namespace ERP\Swagger\Entity\Mixin\Primitives;

use JMS\Serializer\Annotation as JMS;

/**
 * Trait NullPrimitiveTrait
 *
 * @package ERP\Swagger
 * @subpackage Entity\Schemas\Primitives
 */
trait NullPrimitiveTrait
{
    use AnyPrimitiveTrait;
}