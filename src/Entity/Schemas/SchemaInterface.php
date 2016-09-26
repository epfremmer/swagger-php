<?php
/**
 * File SchemaInterface.php
 *
 * @author Edward Pfremmer <epfremme@nerdery.com>
 */
namespace Epfremme\Swagger\Entity\Schemas;

/**
 * Class SchemaInterface
 *
 * @package Epfremme\Swagger
 * @subpackage Entity\Schemas
 */
interface SchemaInterface
{

    /**
     * Return schema type
     * @return string
     */
    public function getType();

    /**
     * Return schema title
     * @return string
     */
    public function getTitle();

    /**
     * Set schema title
     * @param string $title
     * @return self
     */
    public function setTitle($title);

    /**
     * Return schema description
     * @return string
     */
    public function getDescription();

    /**
     * Set schema description
     * @param string $description
     * @return self
     */
    public function setDescription($description);
}
