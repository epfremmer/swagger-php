<?php
/**
 * File DiscriminatorTest.php
 *
 * @author Edward Pfremmer <epfremme@nerdery.com>
 */
namespace Epfremme\Swagger\Tests\Annotations;

use Epfremme\Swagger\Annotations\Discriminator;

/**
 * Class DiscriminatorTest
 *
 * @package Epfremme\Swagger
 * @subPackage Tests\Annotations
 */
class DiscriminatorTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @covers Epfremme\Swagger\Annotations\Discriminator::getClass
     */
    public function testGetClass()
    {
        $annotation = new Discriminator();
        $annotation->default = 'default';
        $annotation->field = 'type';
        $annotation->map = [
            'default' => 'Default\Class',
            'type_1' => 'Type\One\Class',
        ];

        $result = $annotation->getClass([
            'type' => 'type_1'
        ]);

        $this->assertEquals('Type\One\Class', $result);
    }

    /**
     * @covers Epfremme\Swagger\Annotations\Discriminator::getClass
     * @covers Epfremme\Swagger\Annotations\Discriminator::getDefault
     */
    public function testGetClassDefault()
    {
        $annotation = new Discriminator();
        $annotation->default = 'default';
        $annotation->field = 'type';
        $annotation->map = [
            'default' => 'Default\Class',
            'type_1' => 'Type\One\Class',
        ];

        $result = $annotation->getClass([
            'type' => 'type_2'
        ]);

        $this->assertEquals('Default\Class', $result);
    }

    /**
     * @expectedException \Doctrine\Common\Annotations\AnnotationException
     */
    public function testGetClassException()
    {
        $annotation = new Discriminator();
        $annotation->default = 'unknown';
        $annotation->field = 'type';
        $annotation->map = [
            'default' => 'Default\Class',
            'type_1' => 'Type\One\Class',
        ];

        $annotation->getClass([]);
    }
}
