<?php
namespace Behat\Zf2Extension\Compiler;

use Symfony\Component\DependencyInjection\Compiler\CompilerPassInterface,
    Symfony\Component\DependencyInjection\ContainerBuilder;



class Zf2ApplicationCompilerPasses  implements CompilerPassInterface{
  
    public function process(ContainerBuilder $container) {
         
        
      $applicationPath = $container->getParameter('behat.paths.base');
      $configurationPath = $container->getParameter("behat.zf2_extension.application_config_path");
      $fullApplicationConfigPath = $applicationPath.DIRECTORY_SEPARATOR.$configurationPath;
                                            
      if(file_exists($fullApplicationConfigPath)){
         
           $configuration = require $fullApplicationConfigPath;
           
      }
            
      $container->setParameter('behat.zf2_extension.application_config_path',$configuration);
                  
    }    
    
}

?>
