<?php
namespace Behat\Zf2Extension\Compiler;

use Symfony\Component\DependencyInjection\Compiler\CompilerPassInterface,
    Symfony\Component\DependencyInjection\ContainerBuilder;



class Zf2ApplicationCompilerPasses  implements CompilerPassInterface{
  
    public function process(ContainerBuilder $container) {
       
        
       var_dump($container->hasParameter('behat.zf2_application.')); 
        
       $basePath = $container->getParameter("behat.paths.base");
             
       var_dump($basePath);      
        
    }    
    
}

?>
