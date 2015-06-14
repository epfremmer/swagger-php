<?php
/**
 * File SwaggerExtension.php
 *
 * @author Edward Pfremmer <epfremme@nerdery.com>
 */
namespace Epfremmer\SwaggerBundle\DependencyInjection;

use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\Loader\YamlFileLoader;
use Symfony\Component\HttpKernel\DependencyInjection\Extension;
use Symfony\Component\DependencyInjection\ContainerBuilder;

/**
 * Class SwaggerExtension
 *
 * @package Epfremmer\SwaggerBundle
 */
class SwaggerExtension extends Extension
{
    /**
     * {@inheritdoc}
     */
    public function load(array $configs, ContainerBuilder $container)
    {
        $loader = new YamlFileLoader($container, new FileLocator(__DIR__ . '/../Resources/config'));
        $loader->load('services.yaml');
    }
}
