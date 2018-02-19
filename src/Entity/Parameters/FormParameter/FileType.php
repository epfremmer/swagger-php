<?php
/**
 * File FileType.php
 *
 * @author Edward Pfremmer <epfremme@nerdery.com>
 */
namespace Epfremme\Swagger\Entity\Parameters\FormParameter;

use Epfremme\Swagger\Entity\Mixin\Primitives;
use Epfremme\Swagger\Entity\Parameters\AbstractTypedParameter;
use Epfremme\Swagger\Type\FileTypeInterface;
use Epfremme\Swagger\Type\FormParameterInterface;

/**
 * Class FileType
 *
 * @package Epfremme\Swagger
 * @subpackage Entity\Parameters\FormParameter
 */
class FileType extends AbstractTypedParameter implements FormParameterInterface, FileTypeInterface
{

}
