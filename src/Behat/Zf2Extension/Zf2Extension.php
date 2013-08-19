<?php

namespace Behat\Zf2Extension;

use Behat\Behat\Extension\Extension;

use Behat\Zf2Extension\Compiler\Zf2ApplicationCompilerPasses;

use Symfony\Component\DependencyInjection\ContainerBuilder,
    Symfony\Component\DependencyInjection\Loader\XmlFileLoader,
    Symfony\Component\Config\FileLocator;

/**
 * Description of Zf2Extensions
 *
 * @author David Contavalli <mauipipe@gmail.com>
 */
class Zf2Extension extends Extension
{
    public function load(array $config,ContainerBuilder $container)
    {
         $loader = new XmlFileLoader( $container, new FileLocator(__DIR__.'/services'));
         $loader->load('zf2.xml');
       
         if(isset($config['module'])) {
             
             $container->setParameter('behat.zf2_extension.module', $config['module']);
             
         }
         
                 
    }
       
    public function getCompilerPasses() {
       
        return array(
            
            new Zf2ApplicationCompilerPasses()
            
        );
        
    }
}

return new Zf2Extension();
