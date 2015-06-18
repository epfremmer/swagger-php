<?php
/**
 * File ExamplesTest.php
 *
 * @author Edward Pfremmer <epfremme@nerdery.com>
 */
namespace Epfremmer\SwaggerBundle\Tests\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Epfremmer\SwaggerBundle\Entity\Examples;
use Epfremmer\SwaggerBundle\Tests\Mixin\SerializerContextTrait;

/**
 * Class ExamplesTest
 *
 * @package Epfremmer\SwaggerBundle
 * @subpackage Tests\Entity
 */
class ExamplesTest extends \PHPUnit_Framework_TestCase
{
    use SerializerContextTrait;

    /**
     * @var Examples
     */
    protected $examples;

    /**
     * {@inheritdoc}
     */
    protected function setUp()
    {
        $this->examples = new Examples();
    }

    /**
     * @covers Epfremmer\SwaggerBundle\Entity\Examples::getExamples
     * @covers Epfremmer\SwaggerBundle\Entity\Examples::setExamples
     */
    public function testExamples()
    {
        $examples = new ArrayCollection([
            'text/plain' => [
                'foo' => 'bar',
                'baz' => 'foo'
            ],
            'application/json' => [
                'key' => 'any'
            ],
        ]);

        $this->assertClassHasAttribute('examples', Examples::class);
        $this->assertInstanceOf(Examples::class, $this->examples->setExamples($examples));
        $this->assertAttributeInstanceOf(ArrayCollection::class, 'examples', $this->examples);
        $this->assertAttributeEquals($examples, 'examples', $this->examples);
        $this->assertEquals($examples, $this->examples->getExamples());
        $this->assertContainsOnly('array', $this->examples->getExamples());
        $this->assertCount(2, $this->examples->getExamples());
    }

    /**
     * @covers Epfremmer\SwaggerBundle\Entity\Examples
     */
    public function testSerialize()
    {
        $data = json_encode([
            'text/plain' => [
                'foo' => 'bar',
                'baz' => 'foo'
            ],
            'application/json' => [
                'key' => 'any'
            ],
        ]);

        $examples = $this->getSerializer()->deserialize($data, Examples::class, 'json');

        $this->assertInstanceOf(Examples::class, $examples);
        $this->assertAttributeInstanceOf(ArrayCollection::class, 'examples', $examples);
        $this->assertContainsOnly('array', $examples->getExamples());
        $this->assertCount(2, $examples->getExamples());

        $json = $this->getSerializer()->serialize($examples, 'json');

        $this->assertJson($json);
        $this->assertJsonStringEqualsJsonString($data, $json);
    }
}
