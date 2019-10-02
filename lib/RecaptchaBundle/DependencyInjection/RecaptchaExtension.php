<?php
namespace Ghalins\RecaptchaBundle\DependencyInjection;

use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Extension\Extension;
use Symfony\Component\DependencyInjection\Loader\YamlFileLoader;

class RecaptchaExtension extends Extension
{

    /**
     * Loads a specific configuration.
     *
     * @param array $configs
     * @param ContainerBuilder $container
     */
    public function load(array $configs, ContainerBuilder $container)
    {

        $loader= new YamlFileLoader(
            $container,
            new FileLocator(__DIR__ .'/../Resources/config')
        );
        $loader->load('services.yaml');

        $configuration= new Configuration();
        $config=$this->processConfiguration($configuration,$configs);
//        dump($config);die();
        $container->setParameter('recaptcha.key',$config['key']);
        $container->setParameter('recaptcha.secret',$config['secret']);
    }
}