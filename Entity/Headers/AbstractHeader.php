<?php
/**
 * File AbstractHeader.php
 *
 * @author Edward Pfremmer <epfremme@nerdery.com>
 */
namespace Epfremmer\SwaggerBundle\Entity\Headers;

use JMS\Serializer\Annotation as JMS;

/**
 * Class AbstractHeader
 *
 * @JMS\Discriminator(field = "type", map = {
 *   "boolean": "Epfremmer\SwaggerBundle\Entity\Headers\BooleanHeader",
 *   "integer": "Epfremmer\SwaggerBundle\Entity\Headers\IntegerHeader",
 *   "number" : "Epfremmer\SwaggerBundle\Entity\Headers\NumberHeader",
 *   "string" : "Epfremmer\SwaggerBundle\Entity\Headers\StringHeader",
 *   "array"  : "Epfremmer\SwaggerBundle\Entity\Headers\ArrayHeader"
 * })
 *
 * @package Epfremmer\SwaggerBundle
 * @subpackage Entity\Headers
 */
class AbstractHeader 
{

}