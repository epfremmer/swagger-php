<?php
/**
 * File DiscriminatorTest.php
 *
 * @author Edward Pfremmer <epfremme@nerdery.com>
 */
namespace Nerdery\Swagger\Tests\Annotations;

use Nerdery\Swagger\Annotations\Discriminator;

/**
 * Class DiscriminatorTest
 *
 * @package Nerdery\Swagger
 * @subPackage Tests\Annotations
 */
class DiscriminatorTest extends \PHPUnit_Framework_TestCase
{

    /**
     * @covers Nerdery\Swagger\Annotations\Discriminator::getClass
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
     * @covers Nerdery\Swagger\Annotations\Discriminator::getClass
     * @covers Nerdery\Swagger\Annotations\Discriminator::getDefault
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
