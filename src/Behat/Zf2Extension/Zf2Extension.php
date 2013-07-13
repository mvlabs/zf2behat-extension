<?php

namespace Behat\Zf2Extension;

use Behat\Behat\Extension\Extension;
use Symfony\Component\DependencyInjection\ContainerBuilder,
    Symfony\Component\DependencyInjection\Loader\XmlFileLoader,
    Symfony\Component\Config\FileLocator;

/**
 * Description of Zf2Extensions
 *
 * @author mauilap
 */
class Zf2Extension extends Extension
{
    public function load(array $config,ContainerBuilder $container)
    {
         $loader = new XmlFileLoader( $container, new FileLocator(__DIR__.'/services'));
         $loader->load('zf2.xml');

         $configPath = $container->getParameter('behat.paths.base');

         if (!isset($config['zf2_config_path'])) {

             throw new \Exception('You need to set a path for zf2_config_path');

         }

         $zf2ConfigFile = $configPath.DIRECTORY_SEPARATOR.$config['zf2_config_path'];

         if (!file_exists($zf2ConfigFile)) {

             throw new \Exception("File ".$zf2ConfigFile." does not exist");

         }

         $container->setParameter('behat.zf2_extension.zf2_config_path',  $zf2ConfigFile );

    }
}

return new Zf2Extension();
