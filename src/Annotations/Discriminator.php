<?php
/**
 * File Discriminator.php
 *
 * @author Edward Pfremmer <epfremme@nerdery.com>
 */
namespace Epfremme\Swagger\Annotations;

use Doctrine\Common\Annotations\Annotation;
use Doctrine\Common\Annotations\AnnotationException;
use JMS\Serializer\Annotation as JMS;

/**
 * Class Discriminator
 *
 * @Annotation
 * @Target("CLASS")
 *
 * @package Epfremme\Swagger
 * @subpackage Annotations
 */
class Discriminator extends JMS\Discriminator
{
    /**
     * @var string
     */
    public $default;

    /**
     * @var bool
     */
    public $disabled = true;

    /**
     * Return default kay
     *
     * @return string
     * @throws AnnotationException
     */
    private function getDefault()
    {
        if (!array_key_exists($this->default, $this->map)) {
            throw new AnnotationException(sprintf(
                "Attempted to fallback to invalid default discriminator key '%s'",
                $this->default
            ));
        }

        return $this->default;
    }

    /**
     * Return the correct mapped class
     *
     * @param array $data
     * @return mixed
     */
    public function getClass(array $data)
    {
        if (!array_key_exists($this->field, $data)) {
            return $this->map[$this->getDefault()];
        }

        $type = $data[$this->field];

        // fallback to default if type not found in map
        if (!isset($this->map[$type])) {
            $type = $this->getDefault();
        }

        return $this->map[$type];
    }
}
