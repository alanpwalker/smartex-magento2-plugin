<?php
/**
 * @license Copyright 2016-2017 Smartex.io Ltd., MIT License
 * 
 */

namespace Smartex\DependencyInjection;

use Smartex\Config\Configuration;
use Symfony\Component\Config\Definition\Processor;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Loader\XmlFileLoader;
use Symfony\Component\DependencyInjection\Extension\ExtensionInterface;

/**
 * @package Smartex
 */
class SmartexExtension implements ExtensionInterface
{
    public function load(array $configs, ContainerBuilder $container)
    {
        $processor = new Processor();
        $config    = $processor->processConfiguration(new Configuration(), $configs);

        foreach (array_keys($config) as $key) {
            $container->setParameter('smartex.'.$key, $config[$key]);
        }

        $loader = new XmlFileLoader($container, new FileLocator(__DIR__));
        $loader->load('services.xml');

        $container->setParameter('network.class', 'Smartex\Network\\'.ContainerBuilder::camelize($config['network']));
        $container->setParameter(
            'adapter.class',
            'Smartex\Client\Adapter\\'.ContainerBuilder::camelize($config['adapter']).'Adapter'
        );
        $container->setParameter('key_storage.class', $config['key_storage']);
    }

    /**
     * @codeCoverageIgnore
     */
    public function getAlias()
    {
        return 'smartex';
    }

    /**
     * @codeCoverageIgnore
     */
    public function getNamespace()
    {
        return 'http://example.org/schema/dic/smartex';
    }

    /**
     * @codeCoverageIgnore
     */
    public function getXsdValidationBasePath()
    {
        return false;
    }
}
