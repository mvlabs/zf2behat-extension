<?php
namespace Behat\Zf2Extension\Console\Processor;

use Symfony\Component\DependencyInjection\ContainerInterface,
    Symfony\Component\Console\Command\Command,
    Symfony\Component\Console\Input\InputArgument,
    Symfony\Component\Console\Input\InputInterface,
    Symfony\Component\Console\Output\OutputInterface;

use Behat\Behat\Console\Processor\Processor as BaseProcessor;

/**
 * Description of LocatorProcessor
 *
 * @author David Contavalli < mauipipe@gmail.com >
 */

class LocatorProcessor extends BaseProcessor{
    
    private $container;
    
    /**
     * 
     * @param \Symfony\Component\DependencyInjection\ContainerInterface $container
     */
    public function __construct(ContainerInterface $container) {
      
        $this->container = $container;
        
    }
    
    public function configure(Command $command) {
        
        $command->addArgument('features', InputArgument::OPTIONAL,
                 "Feature(s) to run. Could be:".
                 "\n- a dir (<comment>src/to/Module/Features/</comment>), " .
                 "\n- a feature (<comment>src/to/Module/Features/*.feature</comment>), " 
                );
                       
    }
    
    
   public function process(InputInterface $input, OutputInterface $output){
        
        $moduleDetailRetriever =  $this->container->get("zf2_extesion.moduledetailretriever");
        $featuresPath = $input->getArgument('features');
        
        $moduleName = $this->container->getParameter('behat.zf2_extension.module');
        $pathSuffix = $this->container->getParameter('behat.zf2_extension.context.path_suffix');
        $modulePath = null;
       
        
        if($moduleName) {
        
           $modulePath = $moduleDetailRetriever->getModulePath($moduleName);
           
       }
            
       if(!$modulePath && $featuresPath){
           
          $filteredPath = realpath(preg_replace('/\.feature\:.*$/', '.feature', $featuresPath));
          
          foreach($moduleDetailRetriever->getLoadedModules() as $moduleName) {
              
              if(false !== strpos($filteredPath, $moduleDetailRetriever->getModulePath($moduleName))) {
                  
                  $modulePath = $moduleDetailRetriever->getModulePath($moduleName);
                  break;
              } 
              
          }
          
       }elseif($modulePath && $featuresPath) {
           
           $featuresPath = $modulePath.DIRECTORY_SEPARATOR.$pathSuffix.DIRECTORY_SEPARATOR.$featuresPath;
           
       }
       
       
       if($moduleName){
          
           $this->container
                 ->get('zf2.context.class_guesser')
                 ->setModuleNamespace($moduleName);
           
       } 
       
       if(!$featuresPath) {
           
           $featuresPath = $this->container->getParameter('behat.paths.features');
           
       }
       
       
       $this->container
            ->get('behat.console.command')
            ->setFeaturesPaths($featuresPath ? array($featuresPath) : array());
       
    }
        
}

?>
